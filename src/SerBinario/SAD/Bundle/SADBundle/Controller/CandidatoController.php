<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SerBinario\SAD\Bundle\SADBundle\Form\CandidatoType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Candidato controller.
 *
 * @Route("/candidato")
 */
class CandidatoController extends Controller
{
    
    /**
     * @Route("/saveCandidato", name="saveCandidato")
     * @Template()
     */
    public function saveAction(Request $request)
    {               
        #Recuperando o serviço do modelo
        $candidatoRN = $this->get("candidato_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CandidatoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $candidato = $form->getData();
                
                #Resultado da operação
                $result =  $candidatoRN->save($candidato);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Candidato realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new CandidatoType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/viewListCandidato", name="viewListCandidato")
     * @Template("SADBundle:Candidato:gridCandidato.html.twig")
     */
    public function viewListCandidatoAction()
    {      
        return array();
    }
    
    /**
     * @Route("/gridCandidato", name="gridCandidato")
     * @Method({"POST"})
     * @Template("SADBundle:Candidato:gridCandidato.html.twig")
     */
    public function gridCandidatoAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array("a.nomecandidato",
                "a.cpfcandidato",
                "a.rgcandidato",
                "a.emailcandidato",
                "b.descricao",
                );

            $entityJOIN = array("sexosexo");             
            $eventosArray         = array();
            $parametros           = $request->request->all();
            $count                = 0;
            $countNot             = 0;
            $statusLigacao        = false;
            
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Candidato"; 
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
                $eventosArray[$i]['DT_RowId']                   =  "row_".$resultCliente[$i]->getIdcandidato();
                $eventosArray[$i]['id']                         =  $resultCliente[$i]->getIdcandidato();
                $eventosArray[$i]['nomeCandidato']              =  $resultCliente[$i]->getNomecandidato();
                $eventosArray[$i]['cpfCandidato']               =  $resultCliente[$i]->getCpfcandidato();
                $eventosArray[$i]['rgCandidato']                =  $resultCliente[$i]->getRgcandidato();
                $eventosArray[$i]['emailCandidato']             =  $resultCliente[$i]->getEmailcandidato();
                $eventosArray[$i]['sexo']                       =  $resultCliente[$i]->getSexosexo()->getDescricao();
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
     * @Route("/editCandidato/id/{id}", name="editCandidato")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $candidatoRN = $this->get("candidato_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CandidatoType());
        
        if($id) {
            #Recupera o candidato selecionado
            $candidatoRecuperado = $candidatoRN->findById($id);
        }
               
        #Preenche o formulário com os dados do candidato
        $form->setData($candidatoRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $candidato = $form->getData();               
                var_dump($candidato);exit();
                #Resultado da operação
                $result =  $candidatoRN->edit($candidato);
                                      
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Candidato realizado com sucesso');              
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
   
}
