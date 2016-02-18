<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\EmpresaCapacitacoesType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Capacitacoes controller.
 *
 * @Route("/empresacapacitacoes")
 */
class EmpresaCapacitacoesController extends Controller
{
    /**
     * @Route("/saveEmpresaCapacitacoes", name="saveEmpresaCapacitacoes")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $empresaCapacitacoesRN = $this->get("empresaCapacitacoes_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpresaCapacitacoesType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empresaCapacitacoes = $form->getData();
                               
                #Resultado da operação
                $result =  $empresaCapacitacoesRN->save($empresaCapacitacoes);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Dados cadastrado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar os dados');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new EmpresaCapacitacoesType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridEmpresaCapacitacoes", name="gridEmpresaCapacitacoes")
     * @Template()
     */
    public function gridEmpresaCapacitacoesAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "b.nomeCapacitacao",
                "c.nomeEmpresa",
                "a.quantidade"
                );

            $entityJOIN = array("capacitacoes", "empresa");             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCapacitacoes"; 
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
                $eventosArray[$i]['DT_RowId']    =  "row_".$resultCliente[$i]->getIdEmpresaCapacitacoes();
                $eventosArray[$i]['id']          =  $resultCliente[$i]->getIdEmpresaCapacitacoes();
                $eventosArray[$i]['empresa']     =  $resultCliente[$i]->getEmpresa()->getNomeEmpresa();    
                $eventosArray[$i]['capacitacao'] =  $resultCliente[$i]->getCapacitacoes()->getNomeCapacitacao();    
                $eventosArray[$i]['quantidade']  =  $resultCliente[$i]->getQuantidade();    
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
     * @Route("/editEmpresaCapacitacoes/id/{id}", name="editEmpresaCapacitacoes")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $empresaCapacitacoesRN = $this->get("empresaCapacitacoes_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpresaCapacitacoesType());
        
        if($id) {
            #Recupera o empresa selecionado
            $empresaCapacitacoesRecuperado = $empresaCapacitacoesRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($empresaCapacitacoesRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empresaCapacitacoes = $form->getData();               
                
                #Resultado da operação
                $result =  $empresaCapacitacoesRN->edit($empresaCapacitacoes);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Dados atualizados com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar dados');
                }                 
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}
