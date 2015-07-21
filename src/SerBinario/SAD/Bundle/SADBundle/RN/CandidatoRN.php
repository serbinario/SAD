<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\CandidatoDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Candidato;
/**
 * Description of CandidatoRN
 *
 * @author andrey
 */
class CandidatoRN 
{
    /**
     *
     * @var type 
     */
    private $candidatoDAO;
    
    /**
     * 
     * @param CandidatoDAO $candidatoDAO
     */
    public function __construct(CandidatoDAO $candidatoDAO) 
    {
        $this->candidatoDAO = $candidatoDAO;
    }
    
    /**
     * 
     * @param Candidato $candidato
     */
    public function save(Candidato $candidato)
    {
        $result = $this->candidatoDAO->save($candidato);
        
        return $result;
    }
    
    /**
     * 
     * @param Candidato $candidato
     */
    public function edit(Candidato $candidato)
    {
        $result = $this->candidatoDAO->update($candidato);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->candidatoDAO->findById($id);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findCandidatoVagaDisp($id)
    {
        $result = $this->candidatoDAO->findCandidatoVagaDisp($id);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeOpcoesDesejadasByUpdate($idOpcao, $idInforBusca)
    {
        $result = $this->candidatoDAO->removeOpcoesDesejadasByUpdate($idOpcao, $idInforBusca);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idInforBusca
     */
    public function removeOpcoesDesejadasByUpdateVazio($idInforBusca)
    {
        $result = $this->candidatoDAO->removeOpcoesDesejadasByUpdateVazio($idInforBusca);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeLinguaEstrangeiraByUpdate($LgEst, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeLinguaEstrangeiraByUpdate($LgEst, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeLinguaEstrangeiraByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeLinguaEstrangeiraByUpdateVazio($idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeInformaticaByUpdate($infor, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeInformaticaByUpdate($infor, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeInformaticaByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeInformaticaByUpdateVazio($idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeFormcaoByUpdate($formacao, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeFormcaoByUpdate($formacao, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeFormacaoByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeFormacaoByUpdateVazio($idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeExperienciaByUpdate($experiencia, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeExperienciaByUpdate($experiencia, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeExperienciaByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeExperienciaByUpdateVazio($idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeOutrosCursosByUpdate($outrosCursos, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeOutrosCursosByUpdate($outrosCursos, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeOutrosCursosByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeOutrosCursosByUpdateVazio($idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function removeQualificacoesByUpdate($qualificacoes, $idCurriculo)
    {
        $result = $this->candidatoDAO->removeQualificacoesByUpdate($qualificacoes, $idCurriculo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $idCurriculo
     */
    public function removeQualificacoesByUpdateVazio($idCurriculo)
    {
        $result = $this->candidatoDAO->removeQualificacoesByUpdateVazio($idCurriculo);
        
        return $result;
    }
}
