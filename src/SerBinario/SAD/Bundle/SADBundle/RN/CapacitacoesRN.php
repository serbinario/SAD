<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\CapacitacoesDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacoes;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class CapacitacoesRN 
{
    /**
     *
     * @var type 
     */
    private $capacitacoesDAO;
    
    /**
     * 
     * @param CapacitacoesDAO $capacitacoesDAO
     */
    public function __construct(CapacitacoesDAO $capacitacoesDAO) 
    {
        $this->capacitacoesDAO = $capacitacoesDAO;
    }
    
    /**
     * 
     * @param Capacitacoes $capacitacoes
     */
    public function save(Capacitacoes $capacitacoes)
    {
        $result = $this->capacitacoesDAO->save($capacitacoes);
        
        return $result;
    }
    
    /**
     * 
     * @param Capacitacoes $capacitacoes
     */
    public function edit(Capacitacoes $capacitacoes)
    {
        $result = $this->capacitacoesDAO->update($capacitacoes);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->capacitacoesDAO->findById($id);
        
        return $result;
    }
}
