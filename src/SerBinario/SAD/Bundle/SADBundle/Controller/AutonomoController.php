<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;
use SerBinario\SAD\Bundle\SADBundle\Form\AutonomoType;

/**
 * Autonomo controller.
 *
 * @Route("/autonomo")
 */
class AutonomoController extends Controller
{
   /**
     * @Route("/saveAutonomo", name="saveAutonomo")
     * @Template()
     */
    public function saveAction(Request $request)
    {               
        #Recuperando o serviço do modelo
        $autonomoRN = $this->get("autonomo_rn");
        
        #Criando o formulário
        $form = $this->createForm(new AutonomoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $autonomo = $form->getData();
                
                #Resultado da operação
                $result =  $autonomoRN->save($autonomo);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Autonomo realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new AutonomoType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/viewListAutonomo", name="viewListAutonomo")
     * @Template("SADBundle:Autonomo:gridAutonomo.html.twig")
     */
    public function viewListAutonomoAction()
    {      
        return array();
    }
    
    /**
     * @Route("/gridAutonomo", name="gridAutonomo")
     * @Template("SADBundle:Autonomo:gridAutonomo.html.twig")
     */
    public function gridAutonomoAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array("a.nomeautonomo",
                "a.idadeautonomo",
                "a.expeprofissionalautonomo",
                "a.outrarendaautonomo",
                "a.tempoexpeprofissionalautonomo",
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();
            $count                = 0;
            $countNot             = 0;
            $statusLigacao        = false;
            
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo"; 
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
                $eventosArray[$i]['DT_RowId']                   =  "row_".$resultCliente[$i]->getIdautonomo();
                $eventosArray[$i]['id']                         =  $resultCliente[$i]->getIdautonomo();
                $eventosArray[$i]['nomeAutonomo']               =  $resultCliente[$i]->getNomeautonomo();
                $eventosArray[$i]['idadeAutonomo']              =  $resultCliente[$i]->getIdadeautonomo();
                $eventosArray[$i]['expProfissional']            =  $resultCliente[$i]->getExpeprofissionalautonomo();
                $eventosArray[$i]['tempoExp']                   =  $resultCliente[$i]->getTempoexpeprofissionalautonomo();
                $eventosArray[$i]['outraRenda']                 =  $resultCliente[$i]->getOutrarendaautonomo();
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
}
