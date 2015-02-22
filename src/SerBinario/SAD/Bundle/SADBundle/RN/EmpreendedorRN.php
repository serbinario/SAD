<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use \SerBinario\SAD\Bundle\SADBundle\DAO\EmpreendedorDAO;
use \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class EmpreendedorRN 
{
    /**
     *
     * @var type 
     */
    private $empreendedorDAO;
    
    /**
     * 
     * @param EmpreendedorDAO $empreendedorDAO
     */
    public function __construct(EmpreendedorDAO $empreendedorDAO) 
    {
        $this->empreendedorDAO = $empreendedorDAO;
    }
    
    /**
     * 
     * @param Empreendedor $empreendedor
     * @return type
     */
    public function save(Empreendedor $empreendedor)
    {
        $result = $this->empreendedorDAO->save($empreendedor);
        
        return $result;
    }
    
     /**
     * 
     * @param Empreendedor $empreendedor
     * @return type
     */
    public function edit(Empreendedor $empreendedor)
    {
        $result = $this->empreendedorDAO->edit($empreendedor);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function findById($id)
    {
        $result = $this->empreendedorDAO->findById($id);
        
        return $result;
    }
}
