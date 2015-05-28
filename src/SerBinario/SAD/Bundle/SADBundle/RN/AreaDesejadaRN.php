<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\AreaDesejadaDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada;

/**
 * Description of VagaRN
 *
 * @author fabio
 */
class AreaDesejadaRN 
{
    /**
     *
     * @var type 
     */
    private $areaDesejadaDAO;
    
    /**
     * 
     * @param AreaDesejadaDAO $areaDesejadaDAO
     */
    public function __construct(AreaDesejadaDAO $areaDesejadaDAO) 
    {
        $this->areaDesejadaDAO = $areaDesejadaDAO;
    }
    
    /**
     * 
     * @param AreaDesejada $areaDesejada
     */
    public function save(AreaDesejada $areaDesejada)
    {
        $result = $this->areaDesejadaDAO->save($areaDesejada);
        
        return $result;
    }
    
    /**
     * 
     * @param AreaDesejada $areaDesejada
     */
    public function edit(AreaDesejada $areaDesejada)
    {
        $result = $this->areaDesejadaDAO->update($areaDesejada);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->areaDesejadaDAO->findById($id);
        
        return $result;
    }
}
