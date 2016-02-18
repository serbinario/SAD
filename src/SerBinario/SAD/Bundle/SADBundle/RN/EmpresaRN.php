<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\EmpresaDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Empresa;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class EmpresaRN 
{
    /**
     *
     * @var type 
     */
    private $empresaDAO;
    
    /**
     * 
     * @param EmpresaDAO $empresaDAO
     */
    public function __construct(EmpresaDAO $empresaDAO) 
    {
        $this->empresaDAO = $empresaDAO;
    }
    
    /**
     * 
     * @param Empresa $empresa
     */
    public function save(Empresa $empresa)
    {
        $result = $this->empresaDAO->save($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param Empresa $empresa
     */
    public function edit(Empresa $empresa)
    {
        $result = $this->empresaDAO->update($empresa);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->empresaDAO->findById($id);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findAll()
    {
        $result = $this->empresaDAO->findAll();
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findAllVagasDisponiveis()
    {
        $result = $this->empresaDAO->findAllVagasDisponiveis();
        
        return $result;
    }
}
