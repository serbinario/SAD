<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formacao
 *
 * @ORM\Table(name="formacao", indexes={@ORM\Index(name="fk_formacao_curriculo1_idx", columns={"curriculo_idCurriculo"})})
 * @ORM\Entity
 */
class Formacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFormacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformacao;
    
    /**
     * @var \GrauDeFormacao
     *
     * @ORM\ManyToOne(targetEntity="GrauDeFormacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grau_formacao", referencedColumnName="id_grau_formacao")
     * })
     */
    private $grauformacao;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeCursoFormacao", type="string", length=45, nullable=true)
     */
    private $nomecursoformacao;

    /**
     * @var string
     *
     * @ORM\Column(name="instituicaoFormacao", type="string", length=45, nullable=true)
     */
    private $instituicaoformacao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="período", type="string", length=100, nullable=true)
     */
    private $periodo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicioFormacao", type="date", nullable=true)
     */
    private $datainicioformacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataConclusaoFormacao", type="date", nullable=true)
     */
    private $dataconclusaoformacao;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="formacoes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;


    /**
     * Get idformacao
     *
     * @return integer 
     */
    public function getIdformacao()
    {
        return $this->idformacao;
    }
    
    /**
     * 
     * @return type
     */
    function getGrauformacao() {
        return $this->grauformacao;
    }
    
    /**
     * 
     * @param \GrauDeFormacao $grauformacao
     */
    function setGrauformacao($grauformacao) {
        $this->grauformacao = $grauformacao;
    }

    /**
     * Set nomecursoformacao
     *
     * @param string $nomecursoformacao
     * @return Formacao
     */
    public function setNomecursoformacao($nomecursoformacao)
    {
        $this->nomecursoformacao = $nomecursoformacao;

        return $this;
    }

    /**
     * Get nomecursoformacao
     *
     * @return string 
     */
    public function getNomecursoformacao()
    {
        return $this->nomecursoformacao;
    }

    /**
     * Set instituicaoformacao
     *
     * @param string $instituicaoformacao
     * @return Formacao
     */
    public function setInstituicaoformacao($instituicaoformacao)
    {
        $this->instituicaoformacao = $instituicaoformacao;

        return $this;
    }

    /**
     * Get instituicaoformacao
     *
     * @return string 
     */
    public function getInstituicaoformacao()
    {
        return $this->instituicaoformacao;
    }

    /**
     * Set datainicioformacao
     *
     * @param \DateTime $datainicioformacao
     * @return Formacao
     */
    public function setDatainicioformacao($datainicioformacao)
    {
        $this->datainicioformacao = $datainicioformacao;

        return $this;
    }

    /**
     * Get datainicioformacao
     *
     * @return \DateTime 
     */
    public function getDatainicioformacao()
    {
        return $this->datainicioformacao;
    }

    /**
     * Set dataconclusaoformacao
     *
     * @param \DateTime $dataconclusaoformacao
     * @return Formacao
     */
    public function setDataconclusaoformacao($dataconclusaoformacao)
    {
        $this->dataconclusaoformacao = $dataconclusaoformacao;

        return $this;
    }

    /**
     * Get dataconclusaoformacao
     *
     * @return \DateTime 
     */
    public function getDataconclusaoformacao()
    {
        return $this->dataconclusaoformacao;
    }

    /**
     * Set anocursandoformacao
     *
     * @param integer $anocursandoformacao
     * @return Formacao
     */
    public function setAnocursandoformacao($anocursandoformacao)
    {
        $this->anocursandoformacao = $anocursandoformacao;

        return $this;
    }

    /**
     * Get anocursandoformacao
     *
     * @return integer 
     */
    public function getAnocursandoformacao()
    {
        return $this->anocursandoformacao;
    }

    /**
     * Set ultimaformacao
     *
     * @param boolean $ultimaformacao
     * @return Formacao
     */
    public function setUltimaformacao($ultimaformacao)
    {
        $this->ultimaformacao = $ultimaformacao;

        return $this;
    }

    /**
     * Get ultimaformacao
     *
     * @return boolean 
     */
    public function getUltimaformacao()
    {
        return $this->ultimaformacao;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Formacao
     */
    public function setCurriculocurriculo(\SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo = null)
    {
        $this->curriculocurriculo = $curriculocurriculo;

        return $this;
    }

    /**
     * Get curriculocurriculo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo 
     */
    public function getCurriculocurriculo()
    {
        return $this->curriculocurriculo;
    }
    
    /**
     * 
     * @return type
     */
    function getPeriodo() {
        return $this->periodo;
    }
    
    /**
     * 
     * @param type $periodo
     */
    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

}
