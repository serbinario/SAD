<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\AutonomoDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo;

class AutonomoRN 
{    
   /**
     *
     * @var type 
     */
    private $autonomoDAO;
    
    /**
     * 
     * @param AutonomoDAO $autonomoDAO
     */
    public function __construct(AutonomoDAO $autonomoDAO) 
    {
        $this->autonomoDAO = $autonomoDAO;
    }
    
    /**
     * 
     * @param Autonomo $autonomo
     * @return type
     */
    public function save(Autonomo $autonomo)
    {
        $result = $this->autonomoDAO->save($autonomo);
        
        return $result;
    }
    
    /**
     * 
     * @param Autonomo $autonomo
     * @return type
     */
    public function edit(Autonomo $autonomo)
    {
        $result = $this->autonomoDAO->update($autonomo);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->autonomoDAO->findById($id);
        
        return $result;
    }
}
