<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\FuncaoDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Funcao;

/**
 * Description of VagaRN
 *
 * @author fabio
 */
class FuncaoRN 
{
    /**
     *
     * @var type 
     */
    private $funcaoDAO;
    
    /**
     * 
     * @param FuncaoDAO $funcaoDAO
     */
    public function __construct(FuncaoDAO $funcaoDAO) 
    {
        $this->funcaoDAO = $funcaoDAO;
    }
    
    /**
     * 
     * @param Funcao $funcao
     */
    public function save(Funcao $funcao)
    {
        $result = $this->funcaoDAO->save($funcao);
        
        return $result;
    }
    
    /**
     * 
     * @param Funcao $funcao
     */
    public function edit(Funcao $funcao)
    {
        $result = $this->funcaoDAO->update($funcao);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->funcaoDAO->findById($id);
        
        return $result;
    }
}
