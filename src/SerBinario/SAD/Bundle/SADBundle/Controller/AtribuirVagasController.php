<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Candidato controller.
 *
 * @Route("/atribuirvagas")
 */
class AtribuirVagasController extends Controller
{
        
    /**
     * @Route("/pesquisarAreaDesejada", name="pesquisarAreaDesejada")
     * @Template("")
     */
    public function pesquisarAreaDesejadaAction(Request $request)
    {      
        $dado = $request->request->all();
        $msg = "";
        
        $areaRN = $this->get("areaDesejada_rn");
        $areas    = $areaRN->findAllEmpresaDisp($dado['idEmpresa']);

        if ($areas) {
            $msg = "sucesso";
        } else {
            $msg = "erro";
        }
        
        $dados = array(
            "msg" => $msg,
            "areas" => $areas
        );

        return new JsonResponse($dados);
    }
    
    /**
     * @Route("/pesquisarVagas", name="pesquisarVagas")
     * @Template("")
     */
    public function pesquisarVagasAction(Request $request)
    {      
        $dado = $request->request->all();
        $msg = "";
        $vagasArray = array();
        
        $vagasRN  = $this->get("vagas_rn");
        $vagas    = $vagasRN->findAllVagasDisp($dado['idArea']);
        
        if ($vagas) {
            for($i = 0; $i < count($vagas); $i++) {
                $vagasArray[$i]['idVDisp']  = $vagas[$i]->getIdVagasDiponiveis();
                $vagasArray[$i]['nomeVaga'] = $vagas[$i]->getVagas()->getNomeVaga();
            }
            $msg = "sucesso";
        } else {
            $msg = "erro";
        }
        
        $dados = array(
            "msg" => $msg,
            "vagas" => $vagasArray
        );

        return new JsonResponse($dados);
    }
    
    /**
     * @Route("/processamentoPesquisaCadidatosVagasDisp", name="processamentoPesquisaCadidatosVagasDisp")
     */
    public function processamentoPesquisaCadidatosVagasDispAction(Request $request) {
        
        $dados = $request->request->all();
        
        $empresa            = $dados['empresa'];
        $area               = $dados['area_desejada'];
        $vaga               = $dados['vagas_disponivel'];
        $expProfissional    = empty($dados['exp_profissional']) ? "" : $dados['exp_profissional'];
        $conInformatica     = empty($dados['con_informatica']) ? "" : $dados['con_informatica'];
        $conLinguaEstrangeira  = empty($dados['con_lingua_estrangeira']) ? "" : $dados['con_lingua_estrangeira'];
        
        if($expProfissional == '1') {$expProfissional = "g.curriculocurriculo";} else {$expProfissional = "";}
        
        if($conInformatica == '2') {$conInformatica = "h.curriculocurriculo";} else {$conInformatica = "";}
        
        if($conLinguaEstrangeira == '3') {$conLinguaEstrangeira = "i.curriculocurriculo";} else {$conLinguaEstrangeira = "";}
        
        $vagasDRN  = $this->get("vagaDisponivel_rn");
        $vagaD     = $vagasDRN->findById($vaga);
        
        $camposComboBox = array(
            "empresa" => $empresa,
            "area"    => $area,
            "vaga" => $vaga
        );
        
        $camposPesquisa = array(
            "Vagas"       => "f.idVagas = ".$vaga,
            "experiencia"  => "c.idcurriculo = ".$expProfissional,
            "informatica"  => "c.idcurriculo = ".$conInformatica,
            "linguas"      => "c.idcurriculo = ".$conLinguaEstrangeira
        );
        
//        $camposPesquisa = array(
//            "f.idVagas" => $vagaD->getVagas()->getIdVagas(),
//        );
        
        $this->get("session")->set("camposComboBox", $camposComboBox);
        
        $this->get("session")->set("camposPesquisaCandidato", $camposPesquisa);
        
        return $this->redirect($this->generateUrl("viewPesquisaCadidato"));
        
    }
    
    /**
     * @Route("/viewPesquisaCadidato", name="viewPesquisaCadidato")
     * @Template() 
     */
    public function viewPesquisaCadidatoAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array("a.nomecandidato",
                "a.cpfcandidato",
                "a.rgcandidato",
                "a.emailcandidato",
                "b.descricao",
                );
            
            $camposPesquisaCandidato = $this->get("session")->get("camposPesquisaCandidato");

            $entityJOIN = array("sexosexo", "curriculo", "c.informacaoBusca", "d.opcoesdesejadas", 
                                "e.vagas", "c.experienciasProfissionais", "c.informatica", "c.linguasExtrangeiras"); 

//            $entityJOIN = array("sexosexo", "curriculo", "c.informacaoBusca", "d.opcoesdesejadas", "e.vagas"); 
            $eventosArray         = array();
            $parametros           = $request->request->all();
            $whereCamposPesquisa = "";
            
            if (!is_null($camposPesquisaCandidato)) {
                foreach ($camposPesquisaCandidato as $chave => $valor) {
                     if (!empty($valor)) {
                         $whereCamposPesquisa .= "'{$valor}'";       
                     }                    
                }
            }
            $whereCamposPesquisa = substr($whereCamposPesquisa, 0, -4);
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Candidato"; 
            $columnWhereMain      = "";
            $whereValueMain       = "";
            $whereFull            = $whereCamposPesquisa;
            
            $gridClass = new GridClass($this->getDoctrine()->getManager(), 
                    $parametros,
                    $columns,
                    $entity,
                    $entityJOIN,           
                    $columnWhereMain,
                    $whereValueMain, 
                    $whereFull);
            
            $resultCliente  = $gridClass->builderQuery();
 
            if ($whereFull) {
                $countTotal = $gridClass->getCountByWhereFull(
                        array(
                    "b" => "sexosexo",
                    "c" => "curriculo" ), array(
                    "d" => "c.informacaoBusca",
                    "e" => "d.opcoesdesejadas",
                    "f" => "e.vagas",
                    "g" => "c.experienciasProfissionais", 
                    "h" => "c.informatica", 
                    "i" => "c.linguasExtrangeiras")
                        , $whereCamposPesquisa);
            } else {
                $countTotal = $gridClass->getCount();
            }
            
//            if ($whereFull) {
//                $countTotal = $gridClass->getCountByWhereFull(
//                        array(
//                    "b" => "sexosexo",
//                    "c" => "curriculo" ), array(
//                    "d" => "c.informacaoBusca",
//                    "e" => "d.opcoesdesejadas",
//                    "f" => "e.vagas")
//                        , $whereCamposPesquisa);
//            } else {
//                $countTotal = $gridClass->getCount();
//            }
            
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
            
            $novoAcesso = $request->get('novo');

            if(isset($novoAcesso) && $novoAcesso == '1') {
                $this->get("session")->set("camposComboBox", null);
            }
            
            $empresaRN = $this->get("empresa_rn");
            $empresas  = $empresaRN->findAllVagasDisponiveis();
            
            $vagasRN = $this->get("vagas_rn");
            $vagas   = $vagasRN->findAllVagasDisponiveis();
            
            $areaRN  = $this->get("areaDesejada_rn");
            $area    = $areaRN->findAllVagasDisponiveis();
        
            return array('empresas' => $empresas, 'vagas' => $vagas, 'areas' => $area);         
        }
        
    }
    
    /**
     * @Route("/atribuirVaga/id/{id}", name="atribuirVaga")
     * @Template() 
     */
    public function atribuirVagaAction($id)
    {
        $cadidatoRN = $this->get("candidato_rn");
        $cadidato   = $cadidatoRN->findById($id);
        
        
        $camposComboBox = $this->get('session')->get('camposComboBox');
        
        $vagasDRN  = $this->get("vagaDisponivel_rn");
        $vagaD     = $vagasDRN->findById($camposComboBox['vaga']);
        
        //var_dump($vagaD->getQtdVagas());exit();
        
        $empresaRN = $this->get("empresa_rn");
        $empresas  = $empresaRN->findAllVagasDisponiveis();
        
        $vagasRN = $this->get("vagas_rn");
        $vagas    = $vagasRN->findAllVagasDisp($camposComboBox['area']);

        $areaRN  = $this->get("areaDesejada_rn");
        $area    = $areaRN->findAllVagasDisponiveis();

        return array('empresas' => $empresas, 'vagas' => $vagas,
            'areas' => $area, 'candidato' => $cadidato, 'vagasD' => $vagaD);
        
    }
    
    /**
     * @Route("/quantidadeVagas", name="quantidadeVagas")
     * @Template("")
     */
    public function quantidadeVagasAction(Request $request)
    {      
        $dado = $request->request->all();
        $msg = "";
        $vagasArray = array();
        
        $vagasDRN  = $this->get("vagaDisponivel_rn");
        $vagaD     = $vagasDRN->findById($dado['idVaga']);
        
        if ($vagaD) {
                
                $totalVagas       = $vagaD->getQtdVagas();
                $qtdCadidatosVaga = count($vagaD->getCandidato());
                
                $TotalDisponivel  = $totalVagas - $qtdCadidatosVaga;
            
                $vagasArray['qtdVaga']        = $vagaD->getQtdVagas();
                $vagasArray['vagaDisponivel'] = $TotalDisponivel;
                $vagasArray['idVaga']         = $vagaD->getIdVagasDiponiveis();  

            $msg = "sucesso";
        } else {
            $msg = "erro";
        }
        
        $dados = array(
            "msg" => $msg,
            "vaga" => $vagasArray
        );

        return new JsonResponse($dados);
    }
    
    /**
     * @Route("/saveAtribuicaoVaga", name="saveAtribuicaoVaga")
     * @Template("")
     */
    public function saveAtribuicaoVagaAction(Request $request) {
        
        $dado = $request->request->all();
        
        $vagasDRN  = $this->get("vagaDisponivel_rn");
        $vagaD     = $vagasDRN->findById($dado['id_vaga']);
        
        $totalVagas       = $vagaD->getQtdVagas();
        $qtdCadidatosVaga = count($vagaD->getCandidato());

        $TotalDisponivel  = $totalVagas - $qtdCadidatosVaga;
        
        if($TotalDisponivel == 0) {
            $this->addFlash("warning", "Todas as vagas já foram preenchidas!");
        } else {
            $candidatoDRN  = $this->get("candidato_rn");
            $candidato     = $candidatoDRN->findById($dado['id_candidato']);

            $candidato->addVagaDisponivel($vagaD);

            $result = $candidatoDRN->edit($candidato);

            if($result) {
                $this->addFlash("success", "Vaga atribuida com sucesso!");
            } else {
                $this->addFlash("danger", "Erro ao atribuir a vaga!");
            }
        }
              
        return $this->redirect($this->generateUrl("atribuirVaga", array("id" => $dado['id_candidato'])));
        
    }
   
}
