<?php
namespace SerBinario\SAD\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\SecurityContext;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;


class DefaultController extends Controller
{    
    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        return 
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            );

    }
    
    /**
     * @Route("/viewSaveUser", name="viewSaveUser")
     * @Template("")
     */
    public function viewSaveUserAction()
    {
        $roleRN       = $this->get("role_rn");
        $arrayObj     = $roleRN->getRoles();
       // var_dump($arrayObj);exit();
        return array("roles" => $arrayObj);
    }
    
    /**
     * @Route("/saveUser", name="saveUser")
     */
    public function saveUserAction(Request $request)
    {
        $dados = $request->request->all();
        
        $username     = $dados['username'];
        $senha        = $dados['senha'];
        $email        = $dados['email'];
        $roleId       = $dados['perfil'];
              
        if(empty($roleId)) {
            $this->get("session")->getFlashBag()->add('danger', "Você deve informar um perfil"); 
            return $this->redirect($this->generateUrl("viewSaveUser"));
        }     
            
        $user = new \SerBinario\SAD\Bundle\UserBundle\Entity\User;
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setIsActive(true);
        
        $factory   = $this->get('security.encoder_factory');
        $validator = $this->get('validator');
        
        $encoder  = $factory->getEncoder($user);
        $password = $encoder->encodePassword($senha, $user->getSalt());
        $user->setPassword($password);
        
        $roleRN   = $this->get("role_rn");
        $role     = $roleRN->getRole($roleId);
        
        $user->addRole($role);
        
        $userVal = $validator->validate($user);
        
        if( !count($userVal) > 0) {
            $userRN   = $this->get("user_rn");
            
            $valUser  = $userRN->findByEmailOrUsename($user->getUsername());
            $valEmail = $userRN->findByEmailOrUsename($user->getEmail());
            
            if($valUser ||  $valEmail) {              
                $this->get("session")->getFlashBag()->add('danger', "Email ou Login já existentes!");
            } else {
               
                $ultimoRegistro = $userRN->ultimoRegistro();
                $codigo = $ultimoRegistro[0][1] + 1;
                $user->setCodigo("00".$codigo);
                
                $result  = $userRN->save($user);
                
                if($result) {
                    $this->get("session")->getFlashBag()->add('success', "Usuário cadastrado com sucesso!"); 
                } else {
                    $this->get("session")->getFlashBag()->add('danger', "Erro ao cadastrar o usuário"); 
                }
            }                
 
        } else {
            $this->get("session")->getFlashBag()->add('danger', (string) $userVal); 
        }
        
        return $this->redirect($this->generateUrl("viewSaveUser"));
    }
    
    /**
     * @Route("/gridUsuario", name="gridUsuario")
     * @Template()
     */
    public function gridUsuarioAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array("a.id",
                "a.username",
                "a.email",
                "a.codigo",
                "b.name"
                );

            $entityJOIN           = array("roles");             
            $eventosArray         = array();
            $parametros           = $request->request->all();
            
            $entity               = "SerBinario\SAD\Bundle\UserBundle\Entity\User"; 
            $columnWhereMain      = "";
            $whereValueMain       = "";
            
            $gridClass = new GridClass($this->getDoctrine()->getManager(), 
                    $parametros,
                    $columns,
                    $entity,
                    $entityJOIN,           
                    $columnWhereMain,
                    $whereValueMain);

            $resultCliente  = $gridClass->builderQuery();    
            $countTotal     = $gridClass->getCount();
            $countEventos   = count($resultCliente);

            for($i=0;$i < $countEventos; $i++)
            {
                $eventosArray[$i]['DT_RowId']           =  "row_".$resultCliente[$i]->getId();
                $eventosArray[$i]['id']                 =  $resultCliente[$i]->getId();
                $eventosArray[$i]['nome']               =  $resultCliente[$i]->getUsername();
                $eventosArray[$i]['email']              =  $resultCliente[$i]->getEmail();
                $eventosArray[$i]['codigo']             =  $resultCliente[$i]->getCodigo();
                
                $countRoles = count($resultCliente[$i]->getRoles());

                for($j = 0; $j < $countRoles; $j++){
                    $eventosArray[$i]['roles'] = $resultCliente[$i]->getRoles()[$j]->getName();
                }
            }

            //Se a variável $sqlFilter estiver vazio
            if(!$gridClass->isFilter()){
                $countEventos = $countTotal;
            }

            $columns = array(               
                'draw'              => $parametros['draw'],
                'recordsTotal'      => "{$countTotal}",
                'recordsFiltered'   => "{$countEventos}",
                'data'              => $eventosArray               
            );

            return new JsonResponse($columns);
        } else {            
            return array();            
        }
        
    }
    
    /**
     * @Route("/viewEditUser/id/{id}", name="viewEditUser")
     * @Template()
     */
    public function viewEditUserAction($id)
    {
        $roleRN   = $this->get("role_rn");
        $arrayObj = $roleRN->getRoles();
        
        $userRN   = $this->get("user_rn");
        $user     = $userRN->findById($id);

        return array("roles" => $arrayObj, "user" => $user);
    }
    
    /**
     * @Route("/editUser", name="editUser")
     */
    public function editUserAction(Request $request)
    {
        $dados = $request->request->all();
        
        $username = $dados['username'];
        $senha    = $dados['senha'];
        $email    = $dados['email'];
        $roleId   = $dados['perfil'];
        $idUser   = $dados['userid'];
               
        $userRN   = $this->get("user_rn");
        $user     = $userRN->findById($idUser);
        
        if($user->getUsername() !== $username) {
            $valUser  = $userRN->findByEmailOrUsename($username);
            
            if($valUser) {           
                $this->get("session")->getFlashBag()->add('danger', "Login já existentes!");

                return $this->redirect($this->generateUrl("gridUsuario"));
            }    
        }
        
        if($user->getEmail() !== $email) {
            $valEmail = $userRN->findByEmailOrUsename($email);
            
            if($valEmail) {
                $this->get("session")->getFlashBag()->add('danger', "Email existentes!");

                return $this->redirect($this->generateUrl("gridUsuario"));
            }    
        }   
        
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setIsActive(true);
        
        if(!empty($senha)) {
            $factory  = $this->get('security.encoder_factory');
        
            $encoder  = $factory->getEncoder($user);
            $password = $encoder->encodePassword($senha, $user->getSalt());
            $user->setPassword($password);   
        }                  
        
        $roleRN   = $this->get("role_rn");       
        $role     = $roleRN->getRole($roleId);
        
        $user->removeAllRole();
        $user->addRole($role);
    
        $result  = $userRN->update($user);
        
        if($result) {
            $this->get("session")->getFlashBag()->add('success', "Usuário editado com sucesso!"); 
        } else {             
            $this->get("session")->getFlashBag()->add('danger', "Erro ao cadastrar o usuário"); 
        }        
        
        return $this->redirect($this->generateUrl("gridUsuario"));
    }
    
    /**
    * @Route("/savePerfil", name="savePerfil")
    * @Template()
    */
    public function savePerfilAction()
    {      
        $dados = array(
            array('ADMIN', 'ROLE_ADMIN'),
            array('USER', 'ROLE_USER')
        );
        
        for($i = 0; $i < count($dados); $i++){
            $perfil = new \SerBinario\SAD\Bundle\UserBundle\Entity\Role();
            $perfil->setName($dados[$i][0]);
            $perfil->setRole($dados[$i][1]);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($perfil);
            $em->flush();
        };
        
        echo "sucesso";
    }
    
     /**
     * @Route("/saveSexo", name="saveSexo")
     */
    public function saveSexoAction()
    {
        $dados = array(
            array('M', 'Masculino'),
            array('F', 'Feminino')
        );
        
        for($i = 0; $i < count($dados); $i++){
            $sexo = new \SerBinario\SAD\Bundle\UserBundle\Entity\Sexos();
            $sexo->setNomeAbreviaturaSexo($dados[$i][0]);
            $sexo->setNomeExtensoSexo($dados[$i][1]);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($sexo);
            $em->flush();
        };
        
        echo "sucesso";
    }
    
    /**
     * @Route("/login_check", name="login_check")
     */
    public function login_checkAction()
    {

    }
    
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }
}
