<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OutrosCursos
 *
 * @ORM\Table(name="outros_cursos")
 * @ORM\Entity
 */
class OutrosCursos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_outros_cursos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOutrosCursos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="instituicao", type="string", length=150, nullable=true)
     */
    private $instituicao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="curso", type="string", length=100, nullable=true)
     */
    private $curso;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periodo_inicial", type="date", nullable=true)
     */
    private $periodoInicial;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periodo_final", type="date", nullable=true)
     */
    private $periodoFinal;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="outrosCursos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;
    
    /**
     * 
     * @return type
     */
    function getIdOutrosCursos() {
        return $this->idOutrosCursos;
    }
    
    /**
     * 
     * @return type
     */
    function getInstituicao() {
        return $this->instituicao;
    }
    
    /**
     * 
     * @return type
     */
    function getCurso() {
        return $this->curso;
    }
    
    /**
     * 
     * @return type
     */
    function getPeriodoInicial() {
        return $this->periodoInicial;
    }
    
    /**
     * 
     * @return type
     */
    function getPeriodoFinal() {
        return $this->periodoFinal;
    }
    
    /**
     * 
     * @return type
     */
    function getCurriculocurriculo() {
        return $this->curriculocurriculo;
    }
    
    /**
     * 
     * @param type $idOutrosCursos
     */
    function setIdOutrosCursos($idOutrosCursos) {
        $this->idOutrosCursos = $idOutrosCursos;
    }
    
    /**
     * 
     * @param type $instituicao
     */
    function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }
    
    /**
     * 
     * @param type $curso
     */
    function setCurso($curso) {
        $this->curso = $curso;
    }
    
    /**
     * 
     * @param \DateTime $periodoInicial
     */
    function setPeriodoInicial(\DateTime $periodoInicial) {
        $this->periodoInicial = $periodoInicial;
    }
    
    /**
     * 
     * @param \DateTime $periodoFinal
     */
    function setPeriodoFinal(\DateTime $periodoFinal) {
        $this->periodoFinal = $periodoFinal;
    }
    
    /**
     * 
     * @param \Curriculo $curriculocurriculo
     */
    function setCurriculocurriculo($curriculocurriculo) {
        $this->curriculocurriculo = $curriculocurriculo;
    }

}
