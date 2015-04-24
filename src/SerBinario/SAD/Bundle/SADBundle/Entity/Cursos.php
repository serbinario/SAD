<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table(name="cursos")
 * @ORM\Entity
 */
class Cursos 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cursos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCursos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome_curso", type="string", nullable=false)
     */
    private $nomeCurso;
    
    /**
     * 
     * @return type
     */
    public function getIdCursos() 
    {
        return $this->idCursos;
    }

    /**
     * 
     * @return type
     */
    public function getNomeCurso() 
    {
        return $this->nomeCurso;
    }

    /**
     * 
     * @param type $idCursos
     */
    public function setIdCursos($idCursos)
    {
        $this->idCursos = $idCursos;
    }

    /**
     * 
     * @param type $nomeCurso
     */
    public function setNomeCurso($nomeCurso) 
    {
        $this->nomeCurso = $nomeCurso;
    }


}
