<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\VagaDisponivelDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis;

/**
 * Description of VagaRN
 *
 * @author fabio
 */
class VagaDisponivelRN 
{
    /**
     *
     * @var type 
     */
    private $vagaDisponivelDAO;
    
    /**
     * 
     * @param VagaDisponivelDAO $vagaDisponivelDAO
     */
    public function __construct(VagaDisponivelDAO $vagaDisponivelDAO) 
    {
        $this->vagaDisponivelDAO = $vagaDisponivelDAO;
    }
    
    /**
     * 
     * @param VagasDisponiveis $empresa
     */
    public function save(VagasDisponiveis $empresa)
    {
        $result = $this->vagaDisponivelDAO->save($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param VagasDisponiveis $empresa
     */
    public function edit(VagasDisponiveis $empresa)
    {
        $result = $this->vagaDisponivelDAO->update($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->vagaDisponivelDAO->findById($id);
        
        return $result;
    }
}
