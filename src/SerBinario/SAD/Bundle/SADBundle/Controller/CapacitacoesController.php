<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\CapacitacoesType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Capacitacoes controller.
 *
 * @Route("/capacitacoes")
 */
class CapacitacoesController extends Controller
{
    /**
     * @Route("/saveCapacitacoes", name="saveCapacitacoes")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $capacitacoesRN = $this->get("capacitacoes_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CapacitacoesType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $capacitacoes = $form->getData();
                               
                #Resultado da operação
                $result =  $capacitacoesRN->save($capacitacoes);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Capacitacão cadastrada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar a Capacitação');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new CapacitacoesType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridCapacitacoes", name="gridCapacitacoes")
     * @Template()
     */
    public function gridCapacitacoesAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "a.nomeCapacitacao"
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacoes"; 
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
                $eventosArray[$i]['DT_RowId']        =  "row_".$resultCliente[$i]->getIdCapacitacao();
                $eventosArray[$i]['id']              =  $resultCliente[$i]->getIdCapacitacao();
                $eventosArray[$i]['nomeCapacitacao'] =  $resultCliente[$i]->getNomeCapacitacao();                
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
     * @Route("/editCapacitacoes/id/{id}", name="editCapacitacoes")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $capacitacoesRN = $this->get("capacitacoes_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CapacitacoesType());
        
        if($id) {
            #Recupera o empresa selecionado
            $capacitacoesRecuperado = $capacitacoesRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($capacitacoesRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $capacitacoes = $form->getData();               
                
                #Resultado da operação
                $result =  $capacitacoesRN->edit($capacitacoes);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Capacitação atualizada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar a Capacitação');
                }                 
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}
