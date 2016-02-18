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
     * @Template("SADBundle:AtribuirVagas:selecionarCandidatos.html.twig")
     */
    public function processamentoPesquisaCadidatosVagasDispAction(Request $request) {
        
        $dados = $request->request->all();
        
        $empresa                = !empty($dados['empresa']) ? $dados['empresa'] : "";
        $area                   = !empty($dados['area_desejada']) ? $dados['area_desejada'] : "";
        $vaga                   = !empty($dados['vagas_disponivel']) ? $dados['vagas_disponivel'] : "";
        $expProfissional        = empty($dados['exp_profissional']) ? "" : $dados['exp_profissional'];
        $conInformatica         = empty($dados['con_informatica']) ? "" : $dados['con_informatica'];
        $conLinguaEstrangeira   = empty($dados['con_lingua_estrangeira']) ? "" : $dados['con_lingua_estrangeira'];
        $candidatos  = "";
        $vagaDID     = ""; 

        if($request->getMethod() === "POST") {
        
        if($expProfissional == '1') {
            $expProfissional     = " AND c.idcurriculo = x.curriculocurriculo ";
            $expProfissionalJOIN = "JOIN c.experienciasProfissionais x ";
        } else {
            $expProfissional     = "";
            $expProfissionalJOIN = "";
        }
        
        if($conInformatica == '2') {
            $conInformatica     = " AND c.idcurriculo = f.curriculocurriculo ";
            $conInformaticaJOIN = "JOIN c.informatica f ";
        } else {
            $conInformatica     = "";
            $conInformaticaJOIN = "";
        }
        
        if($conLinguaEstrangeira == '3') {
            $conLinguaEstrangeira     = " AND c.idcurriculo = l.curriculocurriculo ";
            $conLinguaEstrangeiraJOIN = "JOIN c.linguasExtrangeiras l ";
        } else {
            $conLinguaEstrangeira     = "";
            $conLinguaEstrangeiraJOIN = "";
        }
        
        $vagasDRN   = $this->get("vagaDisponivel_rn");
        $vagaD      = $vagasDRN->findById($vaga);
        $vagaDID    = $vagaD->getIdVagasDiponiveis();
        
        $camposComboBox = array(
            "empresa" => $empresa,
            "area"    => $area,
            "vaga" => $vaga
        );
        
        $camposPesquisa = array(
            "experiencia"  => $expProfissional,
            "informatica"  => $conInformatica,
            "linguas"      => $conLinguaEstrangeira
        );
        
        $camposPesquisaJOIN = array(
            "experienciaJOIN"  => $expProfissionalJOIN,
            "informaticaJOIN"  => $conInformaticaJOIN,
            "linguasJOIN"      => $conLinguaEstrangeiraJOIN
        );
        
        $joinExtra  = "";
        $whereExtra = "";
        
        foreach ($camposPesquisaJOIN as $join) {
            if($join) {
                $joinExtra .= $join;
            }
        }
        
        foreach ($camposPesquisa as $where) {
            if($where) {
                $whereExtra .= $where;
            }
        }

        $this->get("session")->set("camposComboBox", $camposComboBox);
        
        $query = "SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato a ";
        $join  = "JOIN  a.sexosexo s "
                . "JOIN a.curriculo c "
                . "JOIN c.informacaoBusca i "
                . "JOIN i.opcoesdesejadas o "
                . "JOIN o.vagas e ";
        $where = "WHERE e.idVagas = {$vagaD->getVagas()->getIdVagas()}";
         
        if($joinExtra) {
            $join .= $joinExtra;
        }
        if($whereExtra) {
            $where .= $whereExtra;
        }
        
        $query .= $join . $where;
        
        $maneger    = $this->getDoctrine()->getManager();
        $querySQL   = $maneger->createQuery($query);
        $candidatos = $querySQL->getResult();
        
        
        }
             
        $novoAcesso = $request->get('novo');
        $areaDesejadaId = "";

        if(!is_null($this->get("session")->get('camposComboBox'))) {
            $sessao         = $this->get("session")->get('camposComboBox');
            $areaDesejadaId = $sessao['area'];
        }

        if(isset($novoAcesso) && $novoAcesso == '1') {

            $session = $this->get("session");
            $session->remove('camposComboBox');
            $session->remove('camposPesquisaCandidato');
            $session->remove('camposPesquisaCandidatoJOIN');
            $areaDesejadaId = "";
        }

        $empresaRN = $this->get("empresa_rn");
        $empresas  = $empresaRN->findAllVagasDisponiveis();

        $vagasRN = $this->get("vagas_rn");
        $vagas   = $vagasRN->findAllVagasDisponiveis($areaDesejadaId);

        $areaRN  = $this->get("areaDesejada_rn");
        $areas    = $areaRN->findAllVagasDisponiveis();

        return array('empresas' => $empresas, 'vagas' => $vagas, 'areas' => $areas,
            "candidatos" => $candidatos, "vagaD" => $vagaDID); 
    }
    
    /**
     * @Route("/negarAprovarCandidatos", name="negarAprovarCandidatos")
     * @Template("")
     */
    public function negarAprovarCandidatosAction(Request $request) {
        
       $dados = $request->request->all();
        
        $empresa                = !empty($dados['empresa']) ? $dados['empresa'] : "";
        $area                   = !empty($dados['area_desejada']) ? $dados['area_desejada'] : "";
        $vaga                   = !empty($dados['vagas_disponivel']) ? $dados['vagas_disponivel'] : "";
        $candidatos  = "";
        $vagaDID     = ""; 

        if($request->getMethod() === "POST") {
        
        $vagasDRN   = $this->get("vagaDisponivel_rn");
        $vagaD      = $vagasDRN->findById($vaga);
        $vagaDID    = $vagaD->getIdVagasDiponiveis();
        
        $camposComboBox = array(
            "empresa" => $empresa,
            "area"    => $area,
            "vaga" => $vaga
        );   

        $this->get("session")->set("camposComboBox2", $camposComboBox);
        
        $query = "SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato a ";
        $join  = "JOIN  a.vagasDisponiveis c "
                . "JOIN c.vagas v "
                . "JOIN c.empresas p "
                . "JOIN c.areaDesejada d ";
        $where = "WHERE v.idVagas = {$vagaD->getVagas()->getIdVagas()} AND p.idEmpresa = {$empresa} AND d.idAreaDesejada = {$area} "
        . "AND a.encaminhado = true AND a.negado = false";

        $query .= $join . $where;
        
        $maneger    = $this->getDoctrine()->getManager();
        $querySQL   = $maneger->createQuery($query);
        $candidatos = $querySQL->getResult();
        
        }
             
        $novoAcesso = $request->get('novo');
        $areaDesejadaId = "";

        if(!is_null($this->get("session")->get('camposComboBox2'))) {
            $sessao         = $this->get("session")->get('camposComboBox2');
            $areaDesejadaId = $sessao['area'];
        }

        if(isset($novoAcesso) && $novoAcesso == '1') {

            $session = $this->get("session");
            $session->remove('camposComboBox2');
            $areaDesejadaId = "";
        }

        $empresaRN = $this->get("empresa_rn");
        $empresas  = $empresaRN->findAllVagasDisponiveis();

        $vagasRN = $this->get("vagas_rn");
        $vagas   = $vagasRN->findAllVagasDisponiveis($areaDesejadaId);

        $areaRN  = $this->get("areaDesejada_rn");
        $areas    = $areaRN->findAllVagasDisponiveis();

        return array('empresas' => $empresas, 'vagas' => $vagas, 'areas' => $areas,
            "candidatos" => $candidatos, "vagaD" => $vagaDID); 
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
     * @Route("/encaminharCandidatos", name="encaminharCandidatos")
     * @Template("")
     */
    public function encaminharCandidatosAction(Request $request) {
        
        $dado = $request->request->all();
        $candidatos = isset($dado['id_candidato']) ? $dado['id_candidato'] : "";
        $vagaDisp   = isset($dado['id_vaga']) ? $dado['id_vaga'] : "";
        $dataAtual  = new \DateTime("now");
        
        $vagasDRN      = $this->get("vagaDisponivel_rn");
        $candidatoDRN  = $this->get("candidato_rn");
        $vDispCandDAO  = new \SerBinario\SAD\Bundle\SADBundle\DAO\VagasDisponiveisCandidatoDAO($this->getDoctrine()->getManager());
        
        if ($candidatos) {
            
            $vagaD  = $vagasDRN->findById($vagaDisp);
            
            foreach ($candidatos as $cand) {
                
                $vDispCand = new \SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato();
                $candidato = $candidatoDRN->findById($cand);
                $vDispCand->setCandidato($candidato);
                $vDispCand->setVagasDisponiveis($vagaD);
                $vDispCand->setDataCadastro($dataAtual);
                $vDispCand->setEncaminhado(true);
                
                $vDispCandDAO->save($vDispCand);
                
                $this->addFlash("success", "Candidatos encaminhados com sucesso!");
            }
       
        } else {
            $this->addFlash("warning", "Você precisa selecionar ao menos um candidato!");
        }
        
        return $this->redirect($this->generateUrl("processamentoPesquisaCadidatosVagasDisp"));
        
    }
    
    /**
     * @Route("/saveNegarAprovarCandidato", name="saveNegarAprovarCandidato")
     * @Template("")
     */
    public function saveNegarAprovarCandidatoAction(Request $request) {
        
        $dado = $request->request->all();
        $candidatos = isset($dado['id_candidato_aprovado']) ? $dado['id_candidato_aprovado'] : "";
        $vagaDisp   = isset($dado['id_vaga']) ? $dado['id_vaga'] : "";
        
        //var_dump($vagaDisp);exit();
        
        $vDispCandDAO  = new \SerBinario\SAD\Bundle\SADBundle\DAO\VagasDisponiveisCandidatoDAO($this->getDoctrine()->getManager());
        
        if ($candidatos) {
            
            $confi = false;
            
            foreach ($candidatos as $cand) {
                
                $vDispCand = $vDispCandDAO->findById($cand);
                $vDispCand->setAprovado(true);
                
                $result = $vDispCandDAO->update($vDispCand);
                
                if($result) {
                    $confi = true;
                }
                
            }
            
            $updateNegado = $vDispCandDAO->vagasDipsCandAprovadasByUpdate($vagaDisp, $candidatos);
            
            if($updateNegado && $confi) {
                $this->addFlash("success", "Candidatos aprovados com sucesso, os não selecionados foram negados automaticamente pelo sistema!");
            } else {
                 $this->addFlash("danger", "Erro ao aprovar os candidatos!");
            }
       
        } else {
            $updateNegado = $vDispCandDAO->vagasDipsCandAprovadasByUpdate($vagaDisp, $candidatos);
            
            if($updateNegado) {
                $this->addFlash("success", "Todos os candidatos foram negados!");
            } else {
                 $this->addFlash("danger", "Erro ao negar os candidatos!");
            }
        }
        
        return $this->redirect($this->generateUrl("negarAprovarCandidatos"));
        
    }
   
}
