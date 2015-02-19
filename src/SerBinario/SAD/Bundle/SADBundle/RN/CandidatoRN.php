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
}
