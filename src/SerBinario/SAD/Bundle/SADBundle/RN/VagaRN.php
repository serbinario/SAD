<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\VagaDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Vagas;

/**
 * Description of VagaRN
 *
 * @author fabio
 */
class VagaRN 
{
    /**
     *
     * @var type 
     */
    private $vagaDAO;
    
    /**
     * 
     * @param VagaDAO $vagaDAO
     */
    public function __construct(VagaDAO $vagaDAO) 
    {
        $this->vagaDAO = $vagaDAO;
    }
    
    /**
     * 
     * @param Vagas $empresa
     */
    public function save(Vagas $empresa)
    {
        $result = $this->vagaDAO->save($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param Vagas $empresa
     */
    public function edit(Vagas $empresa)
    {
        $result = $this->vagaDAO->update($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->vagaDAO->findById($id);
        
        return $result;
    }
}
