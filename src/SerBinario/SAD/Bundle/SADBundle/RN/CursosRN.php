<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\CursoDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Cursos;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class CursosRN 
{
    /**
     *
     * @var type 
     */
    private $cursosDAO;
    
    /**
     * 
     * @param CursoDAO $cursosDAO
     */
    public function __construct(CursoDAO $cursosDAO) 
    {
        $this->cursosDAO = $cursosDAO;
    }
    
    /**
     * 
     * @param Cursos $curso
     */
    public function save(Cursos $curso)
    {
        $result = $this->cursosDAO->save($curso);
        
        return $result;
    }
    
    /**
     * 
     * @param Cursos $curso
     */
    public function edit(Cursos $curso)
    {
        $result = $this->cursosDAO->update($curso);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->cursosDAO->findById($id);
        
        return $result;
    }
}
