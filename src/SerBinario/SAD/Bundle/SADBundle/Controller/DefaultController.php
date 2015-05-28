<?php

namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;
use Symfony\Component\HttpFoundation\JsonResponse;

use SerBinario\SAD\Bundle\SADBundle\Form\AreaDesejadaType;
use SerBinario\SAD\Bundle\SADBundle\Form\FuncaoType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/home", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }
    
    /**
     * @Route("/saveAreaDesejada", name="saveAreaDesejada")
     * @Template()
     */
    public function saveAreaDesejadaAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $areaDesejadaRN = $this->get("areaDesejada_rn");
        
        #Criando o formulário
        $form = $this->createForm(new AreaDesejadaType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $areaDesejada = $form->getData();
                               
                #Resultado da operação
                $result =  $areaDesejadaRN->save($areaDesejada);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Área Desejada cadastrada realizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar a Área Desejada');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new AreaDesejadaType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridAreaDesejada", name="gridAreaDesejada")
     * @Template()
     */
    public function gridAreaDesejadaAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "a.areaDesejada"
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada"; 
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
                $eventosArray[$i]['DT_RowId']     =  "row_".$resultCliente[$i]->getIdAreaDesejada();
                $eventosArray[$i]['id']           =  $resultCliente[$i]->getIdAreaDesejada();
                $eventosArray[$i]['nomeAreaDesejada']     =  $resultCliente[$i]->getAreaDesejada();                
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
     * @Route("/editAreaDesejada/id/{id}", name="editAreaDesejada")
     * @Template()
     */
    public function editAreaDesejadaAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $areaDesejadaRN = $this->get("areaDesejada_rn");
        
        #Criando o formulário
        $form = $this->createForm(new AreaDesejadaType());
        
        if($id) {
            #Recupera o empresa selecionado
            $areaDesejadaRecuperado = $areaDesejadaRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($areaDesejadaRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $areaDesejada = $form->getData();               
                
                #Resultado da operação
                $result =  $areaDesejadaRN->edit($areaDesejada);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Área Desejada atualizada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar a Área Desejada');
                }                    
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/saveFuncao", name="saveFuncao")
     * @Template()
     */
    public function saveFuncaoAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $funcaoRN = $this->get("funcao_rn");
        
        #Criando o formulário
        $form = $this->createForm(new FuncaoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $funcao = $form->getData();
                               
                #Resultado da operação
                $result =  $funcaoRN->save($funcao);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Função cadastrada realizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar a Função');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new FuncaoType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridFuncao", name="gridFuncao")
     * @Template()
     */
    public function gridFuncaoAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "a.funcao"
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Funcao"; 
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
                $eventosArray[$i]['DT_RowId']     =  "row_".$resultCliente[$i]->getIdFuncao();
                $eventosArray[$i]['id']           =  $resultCliente[$i]->getIdFuncao();
                $eventosArray[$i]['nomeFuncao']     =  $resultCliente[$i]->getFuncao();                
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
     * @Route("/editFuncao/id/{id}", name="editFuncao")
     * @Template()
     */
    public function editFuncaoAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $funcaoRN = $this->get("funcao_rn");
        
        #Criando o formulário
        $form = $this->createForm(new FuncaoType());
        
        if($id) {
            #Recupera o empresa selecionado
            $funcaoRecuperado = $funcaoRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($funcaoRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $funcao = $form->getData();               
                
                #Resultado da operação
                $result =  $funcaoRN->edit($funcao);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Função atualizada com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar a Função');
                }                    
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}
