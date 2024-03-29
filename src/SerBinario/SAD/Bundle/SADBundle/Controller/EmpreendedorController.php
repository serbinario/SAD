<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\EmpreendedorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Empreendedor controller.
 *
 * @Route("/empreendedor")
 */
class EmpreendedorController extends Controller
{
    
    /**
     * @Route("/saveEmpreendedor", name="saveEmpreendedor")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $empreendedorRN = $this->get("empreendedor_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpreendedorType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empreendedor = $form->getData();
                
                #seta o usuário
                $empreendedor->setUser($usuario);
                
                #Alterando
                $result = $empreendedorRN->save($empreendedor);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('success', 'Candidato realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new EmpreendedorType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/viewListEmpreendedor", name="viewListEmpreendedor")
     * @Template("SADBundle:Empreendedor:gridEmpreendedor.html.twig")
     */
    public function viewListEmpreendedorAction()
    {      
        return array();
    }
    
    /**
     * @Route("/gridEmpreendedor", name="gridEmpreendedor")
     * @Method({"POST"})
     * @Template("SADBundle:Empreendedor:gridEmpreendedor.html.twig")
     */
    public function gridEmpreendedorAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array("a.nomeempreendedor",
                "a.idadeempreendedor",
                "a.expeprofissionalempreendedor",
                "a.outrarendaempreendedor",
                "a.tempoexpeprofissionalempreendedor",
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();
            $count                = 0;
            $countNot             = 0;
            $statusLigacao        = false;
            
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor"; 
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
                $eventosArray[$i]['DT_RowId']                   =  "row_".$resultCliente[$i]->getIdempreendedor();
                $eventosArray[$i]['id']                         =  $resultCliente[$i]->getIdempreendedor();
                $eventosArray[$i]['nomeEmpreendedor']           =  $resultCliente[$i]->getNomeempreendedor();
                $eventosArray[$i]['idadeEmpreendedor']          =  $resultCliente[$i]->getIdadeempreendedor();
                $eventosArray[$i]['expProfissional']            =  $resultCliente[$i]->getExpeprofissionalempreendedor();
                $eventosArray[$i]['tempoExp']                   =  $resultCliente[$i]->getTempoexpeprofissionalempreendedor();
                $eventosArray[$i]['outraRenda']                 =  $resultCliente[$i]->getOutrarendaempreendedor();
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
        }else{            
            return array();            
        }
        
    }
    
    /**
     * @Route("/editEmpreendedor/id/{id}", name="editEmpreendedor")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $empreendedorRN = $this->get("empreendedor_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpreendedorType());
        
        if($id) {
            #Recupera o empreendedor selecionado
            $empreendedorRecuperado = $empreendedorRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empreendedor
        $form->setData($empreendedorRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empreendedor = $form->getData();               
                
                #Resultado da operação
                $result =  $empreendedorRN->edit($empreendedor);
                                      
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('success', 'Empreendedor atualizado com sucesso');              
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
   
}
