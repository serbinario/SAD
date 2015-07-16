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
    
    /**
     * @Route("/relatorioAtendimento", name="relatorioAtendimento")
     * @Template()
     */
    public function relatorioAtendimentoAction() {
        
        return array();
        
    }
    
    /**
     * @Route("/relatorioSupervisor", name="relatorioSupervisor")
     * @Template()
     */
    public function relatorioSupervisorAction() {
        
        return array();
        
    }
    
    /**
     * @Route("/processRelatorioAtendimento", name="processRelatorioAtendimento")
     * @Template("SADBundle:Default:relatorioAtendimento.html.twig")
     */
    public function processRelatorioAtendimentoAction(Request $request) {
        
        $dados = $request->request->all();
        $dataInicial  = isset($dados['dataInicial']) ?  $dados['dataInicial'] : "";
        $dataFinal    = isset($dados['dataFinal']) ?  $dados['dataFinal'] : "";
         
        if($dataInicial && $dataFinal) {
            $dataFormatadaIni = \DateTime::createFromFormat("d/m/Y", $dataInicial);
            $dataFormatadaFin = \DateTime::createFromFormat("d/m/Y", $dataFinal);
            $manager = $this->getDoctrine()->getManager();
            
            $query1   = $manager->createQuery("SELECT count(c) as cadastros, u.codigo FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato c "
                    . "JOIN c.user u "
                    . "JOIN u.roles r "
                    . "WHERE c.user = u.id and c.dataCadastro"
                    . " BETWEEN '{$dataFormatadaIni->format("Y-m-d")}' AND '{$dataFormatadaFin->format("Y-m-d")}' AND r.id = 2 group by u.codigo ");
            $result1 = $query1->getResult();
            
            $query2   = $manager->createQuery("SELECT count(c) as totalCadastro FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato c "
                    . "JOIN c.user u "
                    . "JOIN u.roles r "
                    . "WHERE c.user = u.id and c.dataCadastro"
                    . " BETWEEN '{$dataFormatadaIni->format("Y-m-d")}' AND '{$dataFormatadaFin->format("Y-m-d")}' AND r.id = 2");
            $quantidade = $query2->getResult();

            return array("resultados" => $result1, "quantidadeTotal" => $quantidade);
        } else {
            $this->addFlash("warning", "É obrigatório informar as datas");
        }
        
        return array();
    }
    
    /**
     * @Route("/processRelatorioSupervisor", name="processRelatorioSupervisor")
     * @Template("SADBundle:Default:relatorioSupervisor.html.twig")
     */
    public function processRelatorioSupervisorAction(Request $request) {
        
        $dados = $request->request->all();
        $dataInicial  = isset($dados['dataInicial']) ?  $dados['dataInicial'] : "";
        $dataFinal    = isset($dados['dataFinal']) ?  $dados['dataFinal'] : "";
         
        if($dataInicial && $dataFinal) {
            $dataFormatadaIni = \DateTime::createFromFormat("d/m/Y", $dataInicial);
            $dataFormatadaFin = \DateTime::createFromFormat("d/m/Y", $dataFinal);
            $manager = $this->getDoctrine()->getManager();
            
            $query1   = $manager->createQuery("SELECT count(c) as cadastros, u.codigo FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato c "
                    . "JOIN c.usuario u "
                    . "JOIN u.roles r "
                    . "WHERE c.usuario = u.id and c.dataCadastro "
                    . "BETWEEN '{$dataFormatadaIni->format("Y-m-d")}' AND '{$dataFormatadaFin->format("Y-m-d")}' AND r.id = 3 group by u.codigo ");
            $result1 = $query1->getResult();
            
            $query2   = $manager->createQuery("SELECT count(c) as totalCadastro FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato c "
                    . "JOIN c.usuario u "
                    . "JOIN u.roles r "
                    . "WHERE c.usuario = u.id and c.dataCadastro "
                    . "BETWEEN '{$dataFormatadaIni->format("Y-m-d")}' AND '{$dataFormatadaFin->format("Y-m-d")}' AND r.id = 3");
            $quantidade = $query2->getResult();

            return array("resultados" => $result1, "quantidadeTotal" => $quantidade);
        } else {
            $this->addFlash("warning", "É obrigatório informar as datas");
        }
        
        return array();
    }
    
    /**
     * @Route("/relatorioEncaminhamento", name="relatorioEncaminhamento")
     * @Template("")
     */
    public function relatorioEncaminhamentoAction(Request $request) {
        
       $dados = $request->request->all();
        
        $empresa                = !empty($dados['empresa']) ? $dados['empresa'] : "";
        $area                   = !empty($dados['area_desejada']) ? $dados['area_desejada'] : "";
        $vaga                   = !empty($dados['vagas_disponivel']) ? $dados['vagas_disponivel'] : "";
        $candidatos  = "";
        $vagaDID     = ""; 
        $quantidadeAprovados = "";

        if($request->getMethod() === "POST") {
        
        $vagasDRN   = $this->get("vagaDisponivel_rn");
        $vagaD      = $vagasDRN->findById($vaga);
        $vagaDID    = $vagaD->getIdVagasDiponiveis();
        
        $camposComboBox = array(
            "empresa" => $empresa,
            "area"    => $area,
            "vaga" => $vaga
        );   

        $this->get("session")->set("camposComboBox3", $camposComboBox);
        
        $query = "SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato a ";
        $join  = "JOIN  a.vagasDisponiveis c "
                . "JOIN c.vagas v "
                . "JOIN c.empresas p "
                . "JOIN c.areaDesejada d ";
        $where = "WHERE v.idVagas = {$vagaD->getVagas()->getIdVagas()} AND p.idEmpresa = {$empresa} AND d.idAreaDesejada = {$area} "
        . "AND a.encaminhado = true";

        $query .= $join . $where;
        
        $maneger    = $this->getDoctrine()->getManager();
        $querySQL   = $maneger->createQuery($query);
        $candidatos = $querySQL->getResult();
        
        //Pega a quantidade
        $query2 = "SELECT count(a) as quantidadeAprovados FROM SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato a ";
        $join2  = "JOIN  a.vagasDisponiveis c "
                . "JOIN c.vagas v "
                . "JOIN c.empresas p "
                . "JOIN c.areaDesejada d ";
        $where2 = "WHERE v.idVagas = {$vagaD->getVagas()->getIdVagas()} AND p.idEmpresa = {$empresa} AND d.idAreaDesejada = {$area} "
        . "AND a.aprovado = true";

        $query2 .= $join2 . $where2;
        $querySQL2              = $maneger->createQuery($query2);
        $quantidadeAprovados    = $querySQL2->getResult();
        
        }
             
        $novoAcesso = $request->get('novo');
        $areaDesejadaId = "";

        if(!is_null($this->get("session")->get('camposComboBox3'))) {
            $sessao         = $this->get("session")->get('camposComboBox3');
            $areaDesejadaId = $sessao['area'];
        }

        if(isset($novoAcesso) && $novoAcesso == '1') {

            $session = $this->get("session");
            $session->remove('camposComboBox3');
            $areaDesejadaId = "";
        }

        $empresaRN = $this->get("empresa_rn");
        $empresas  = $empresaRN->findAllVagasDisponiveis();

        $vagasRN = $this->get("vagas_rn");
        $vagas   = $vagasRN->findAllVagasDisponiveis($areaDesejadaId);

        $areaRN  = $this->get("areaDesejada_rn");
        $areas    = $areaRN->findAllVagasDisponiveis();

        return array('empresas' => $empresas, 'vagas' => $vagas, 'areas' => $areas,
            "candidatos" => $candidatos, "vagaD" => $vagaDID, "quantidadeAprovados" => $quantidadeAprovados); 
    }
}
