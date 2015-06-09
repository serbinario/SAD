<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\VagasType;
use SerBinario\SAD\Bundle\SADBundle\Form\VagasDisponiveisType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

use SerBinario\SAD\Bundle\SADBundle\DAO\VagaDAO;

/**
 * Empresa controller.
 *
 * @Route("/vaga")
 */
class VagaController extends Controller
{
   /**
     * @Route("/saveVaga", name="saveVaga")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $vagaRN = $this->get("vagas_rn");
        
        #Criando o formulário
        $form = $this->createForm(new VagasType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $vagas = $form->getData();
                               
                #Resultado da operação
                $result =  $vagaRN->save($vagas);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Vaga cadastrada realizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar a Vaga');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new VagasType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridVagas", name="gridVagas")
     * @Template()
     */
    public function gridVagasAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "a.nomeVaga"
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Vagas"; 
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
                $eventosArray[$i]['DT_RowId']     =  "row_".$resultCliente[$i]->getIdVagas();
                $eventosArray[$i]['id']           =  $resultCliente[$i]->getIdVagas();
                $eventosArray[$i]['nomeVaga']     =  $resultCliente[$i]->getNomeVaga();                
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
     * @Route("/editVagas/id/{id}", name="editVagas")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $vagaRN = $this->get("vagas_rn");
        
        #Criando o formulário
        $form = $this->createForm(new VagasType());
        
        if($id) {
            #Recupera o empresa selecionado
            $vagaRecuperado = $vagaRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($vagaRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $vaga = $form->getData();               
                
                #Resultado da operação
                $result =  $vagaRN->edit($vaga);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Vaga atualizada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar a Vaga');
                }                    
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/saveVagaDisponiveis", name="saveVagaDisponiveis")
     * @Template()
     */
    public function saveVagaDisponiveisAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $vagaDisponivelRN = $this->get("vagaDisponivel_rn");
        
        #Criando o formulário
        $form = $this->createForm(new VagasDisponiveisType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $vagaDisponivel = $form->getData();
                               
                #Resultado da operação
                $result =  $vagaDisponivelRN->save($vagaDisponivel);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Vaga cadastrada realizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar a Vaga');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new VagasDisponiveisType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridVagasDisponiveis", name="gridVagasDisponiveis")
     * @Template()
     */
    public function gridVagasDisponiveisAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "b.nomeVaga",
                "c.nomeEmpresa",
                "d.areaDesejada",
                "a.qtdVagas",                
                );

            $entityJOIN = array("vagas", "empresas", "areaDesejada");             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis"; 
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
                $eventosArray[$i]['DT_RowId']       =  "row_".$resultCliente[$i]->getIdVagasDiponiveis();
                $eventosArray[$i]['id']             =  $resultCliente[$i]->getIdVagasDiponiveis();
                $eventosArray[$i]['quantidade']     =  $resultCliente[$i]->getQtdVagas();
                $eventosArray[$i]['vaga']           =  $resultCliente[$i]->getVagas()->getNomeVaga();
                $eventosArray[$i]['empresa']        =  $resultCliente[$i]->getEmpresas()->getNomeEmpresa();
                $eventosArray[$i]['areaDesejada']   =  $resultCliente[$i]->getAreaDesejada()->getAreaDesejada();
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
     * @Route("/editVagasDisponiveis/id/{id}", name="editVagasDisponiveis")
     * @Template()
     */
    public function editVagasDisponiveisAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $vagaDisponivelRN = $this->get("vagaDisponivel_rn");
        
        #Criando o formulário
        $form = $this->createForm(new VagasDisponiveisType());
        
        if($id) {
            #Recupera o empresa selecionado
            $vagaDisponivelRecuperada = $vagaDisponivelRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($vagaDisponivelRecuperada);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $vagaDisponivel = $form->getData();               
                
                #Resultado da operação
                $result =  $vagaDisponivelRN->edit($vagaDisponivel);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Vaga atualizada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar a Vaga');
                }                    
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/vagasAreaPro", name="vagasAreaPro")
     * @Template()
     */
    public function vagasAreaProAction(Request $request) {
        $dado = $request->request->all();
        $msg = "";
        
        $vagasDAO = new VagaDAO($this->getDoctrine()->getManager());
        $vagas    = $vagasDAO->findVagasAreaProAjax($dado['idAreaProfissional']);

        if ($vagas) {
            $msg = "sucesso";
        } else {
            $msg = "erro";
        }
        
        $dados = array(
            "msg" => $msg,
            "vagas" => $vagas
        );

        return new JsonResponse($dados);
    }
    
}