<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\EmpresaCapacitacoesDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCapacitacoes;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class EmpresaCapacitacoesRN
{
    /**
     *
     * @var type 
     */
    private $empresaCapacitacoesDAO;
    
    /**
     * 
     * @param EmpresaCapacitacoesDAO $empresaCapacitacoesDAO
     */
    public function __construct(EmpresaCapacitacoesDAO $empresaCapacitacoesDAO) 
    {
        $this->empresaCapacitacoesDAO = $empresaCapacitacoesDAO;
    }
    
    /**
     * 
     * @param EmpresaCapacitacoes $empresaCapacitacoes
     * @return type
     */
    public function save(EmpresaCapacitacoes $empresaCapacitacoes)
    {
        $result = $this->empresaCapacitacoesDAO->save($empresaCapacitacoes);
        
        return $result;
    }
    
     /**
     * 
     * @param EmpresaCapacitacoes $empresaCapacitacoes
     * @return type
     */
    public function edit(EmpresaCapacitacoes $empresaCapacitacoes)
    {
        $result = $this->empresaCapacitacoesDAO->update($empresaCapacitacoes);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function findById($id)
    {
        $result = $this->empresaCapacitacoesDAO->findById($id);
        
        return $result;
    }
}
