<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\EmpresaCursoDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class EmpresaCursosRN 
{
    /**
     *
     * @var type 
     */
    private $empresaCursosDAO;
    
    /**
     * 
     * @param EmpresaCursoDAO $empresaCursosDAO
     */
    public function __construct(EmpresaCursoDAO $empresaCursosDAO) 
    {
        $this->empresaCursosDAO = $empresaCursosDAO;
    }
    
    /**
     * 
     * @param EmpresaCursos $empresaCursos
     * @return type
     */
    public function save(EmpresaCursos $empresaCursos)
    {
        $result = $this->empresaCursosDAO->save($empresaCursos);
        
        return $result;
    }
    
     /**
     * 
     * @param EmpresaCursos $empresaCursos
     * @return type
     */
    public function edit(EmpresaCursos $empresaCursos)
    {
        $result = $this->empresaCursosDAO->update($empresaCursos);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function findById($id)
    {
        $result = $this->empresaCursosDAO->findById($id);
        
        return $result;
    }
}
