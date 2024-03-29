<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $candidatoRN = $this->get("candidato_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CandidatoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            //var_dump($form->getData());exit();
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $candidato = $form->getData();
                
                #seta o usuário
                $candidato->setUser($usuario);

                #Resultado da operação
                $result =  $candidatoRN->save($candidato);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('success', 'Candidato realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new CandidatoType());
               
                #Retorno
                return array("form" => $form->createView());
            } else {
                $this->get('session')->getFlashBag()->add('warning', 'Há campos obrigatório que ainda não foram preenchidos');
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
     * @Route("/gridCandidato", name="gridCandidato")     * 
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
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
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
                $candidato->setUsuario($usuario);
                
                //Adiciona as opções desejadas
                $idOpcoesDesejadas = array();
                foreach ($candidato->getCurriculo()->getInformacaoBusca()->getOpcoesdesejadas() as $opcoesDesejadas) {
                    $idOpcoesDesejadas[] = $opcoesDesejadas->getIdopcoesareadesejada();
                    $opcoesDesejadas->setInformacoesbuscainformacoesbusca($candidato->getCurriculo()->getInformacaoBusca());
                }
                
                //Remove as opções desejadas
                $countOpcoesDesejadas = count($idOpcoesDesejadas);
                if ($countOpcoesDesejadas > 0) {
                    $candidatoRN->removeOpcoesDesejadasByUpdate($idOpcoesDesejadas, $candidato->getCurriculo()->getInformacaoBusca()->getIdinformacoesbusca());
                } else {
                    $candidatoRN->removeOpcoesDesejadasByUpdateVazio($candidato->getCurriculo()->getInformacaoBusca()->getIdinformacoesbusca());
                }
                
                
                //Pegas os ids das linguas estrangeiras
                $idLgEstrangeira = array();
                foreach ($candidato->getCurriculo()->getLinguasExtrangeiras() as $lgEstrangeira) {
                    $idLgEstrangeira[] = $lgEstrangeira->getIdlinguaextrangeira();
                    $lgEstrangeira->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove as linguas estrangeiras
                $countLgEstrangeira = count($idLgEstrangeira);
                if ($countLgEstrangeira > 0) {
                    $candidatoRN->removeLinguaEstrangeiraByUpdate($idLgEstrangeira, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeLinguaEstrangeiraByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                //Pegas os ids dos cursos de informática
                $idInformatica = array();
                foreach ($candidato->getCurriculo()->getInformatica() as $informatica) {
                    $idInformatica[] = $informatica->getIdinformatica();
                    $informatica->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove os cursos de informática
                $countInformatica = count($idInformatica);
                if ($countInformatica > 0) {
                    $candidatoRN->removeInformaticaByUpdate($idInformatica, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeInformaticaByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                //Adiciona os ids das formações/escolaridade
                $idFormacao = array();
                foreach ($candidato->getCurriculo()->getFormacoes() as $formacao) {
                    $idFormacao[] = $formacao->getIdformacao();
                    $formacao->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove as formações escolaridades
                $countFormacoes= count($idFormacao);
                if ($countFormacoes > 0) {
                    $candidatoRN->removeFormcaoByUpdate($idFormacao, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeFormacaoByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                //Adiciona as expericência profissionais
                $idExperiencia = array();
                foreach ($candidato->getCurriculo()->getExperienciasProfissionais() as $experiencia) {
                    $idExperiencia[] = $experiencia->getIdexperienciaprofissional();
                    $experiencia->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove as formações expericencia
                $countExperiencia = count($idExperiencia);
                if ($countExperiencia > 0) {
                    $candidatoRN->removeExperienciaByUpdate($idExperiencia, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeExperienciaByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                //Adiciona os ids dos cursos de outrosCursos
                $idOutrosCursos = array();
                foreach ($candidato->getCurriculo()->getOutrosCursos() as $outroCurso) {
                    $idOutrosCursos[] = $outroCurso->getIdOutrosCursos();
                    $outroCurso->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove as formações outrosCursos
                $countOutrosCursos = count($idOutrosCursos);
                if ($countOutrosCursos > 0) {
                    $candidatoRN->removeOutrosCursosByUpdate($idOutrosCursos, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeOutrosCursosByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                //Adiciona os ids dos cursos de qualificação futura
                $idQualificacao = array();
                foreach ($candidato->getCurriculo()->getQualificacoesFuturas() as $Qualificacoes) {
                    $idQualificacao[] = $Qualificacoes->getIdqualificacaofutura();
                    $Qualificacoes->setCurriculocurriculo($candidato->getCurriculo());
                }
                
                //Remove as formações qualificação futura
                $countQualificacoes = count($idQualificacao);
                if ($countQualificacoes > 0) {
                    $candidatoRN->removeQualificacoesByUpdate($idQualificacao, $candidato->getCurriculo()->getIdcurriculo());
                } else {
                    $candidatoRN->removeQualificacoesByUpdateVazio($candidato->getCurriculo()->getIdcurriculo());
                }
                
                #Resultado da operação
                $result =  $candidatoRN->edit($candidato);
                                      
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('success', 'Candidato realizado com sucesso');              
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/curriculo/id/{id}", name="curriculo")
     * @Template("")
     */
    public function curriculoAction($id) {
        
        $candidatoRN = $this->get('candidato_rn');
        $candidato   = $candidatoRN->findById($id);
        
        $html = $this->renderView('SADBundle:Candidato:curriculo.html.twig', array('candidato' => $candidato));
        
        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html, array(
                'page-size'     => 'A4',
                'margin-top'    => '5mm',
                'images'        => true)),
            200,
            array(
                'Content-Type'          => 'application/pdf',
            )
        );
        
    }
    
    /**
     * @Route("/curriculoPage/id/{id}", name="curriculoPage")
     * @Template("")
     */
    public function curriculoPageAction($id) {
        
        $candidatoRN = $this->get('candidato_rn');
        $candidato   = $candidatoRN->findById($id);
        
        return array('candidato' => $candidato);
        
    }
   
}
