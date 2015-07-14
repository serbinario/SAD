<?php
namespace SerBinario\SAD\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;


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
     * 
     * @Route("/savePerfil", name="savePerfil")
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
