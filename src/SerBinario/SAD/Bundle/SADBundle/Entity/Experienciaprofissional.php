<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experienciaprofissional
 *
 * @ORM\Table(name="experienciaProfissional", indexes={@ORM\Index(name="fk_experienciaProfissional_curriculo1_idx", columns={"curriculo_idCurriculo"})})
 * @ORM\Entity
 */
class Experienciaprofissional
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idExperienciaProfissional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idexperienciaprofissional;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeDaEmpresaExperienciaProfissional", type="string", length=45, nullable=true)
     */
    private $nomedaempresaexperienciaprofissional;

    /**
     * @var string
     *
     * @ORM\Column(name="ultimoCargoExperienciaProfissional", type="string", length=45, nullable=true)
     */
    private $ultimocargoexperienciaprofissional;

    /**
     * @var float
     *
     * @ORM\Column(name="ultimoSalarioExperienciaProfissional", type="float", precision=10, scale=0, nullable=true)
     */
    private $ultimosalarioexperienciaprofissional;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataAdmissaoExperienciaProfissional", type="date", nullable=true)
     */
    private $dataadmissaoexperienciaprofissional;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataDemissaoExperienciaProfissional", type="date", nullable=true)
     */
    private $datademissaoexperienciaprofissional;

    /**
     * @var string
     *
     * @ORM\Column(name="atribuicoesExperienciaProfissional", type="text", nullable=true)
     */
    private $atribuicoesexperienciaprofissional;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="experienciasProfissionais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;



    /**
     * Get idexperienciaprofissional
     *
     * @return integer 
     */
    public function getIdexperienciaprofissional()
    {
        return $this->idexperienciaprofissional;
    }

    /**
     * Set nomedaempresaexperienciaprofissional
     *
     * @param string $nomedaempresaexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setNomedaempresaexperienciaprofissional($nomedaempresaexperienciaprofissional)
    {
        $this->nomedaempresaexperienciaprofissional = $nomedaempresaexperienciaprofissional;

        return $this;
    }

    /**
     * Get nomedaempresaexperienciaprofissional
     *
     * @return string 
     */
    public function getNomedaempresaexperienciaprofissional()
    {
        return $this->nomedaempresaexperienciaprofissional;
    }

    /**
     * Set ultimocargoexperienciaprofissional
     *
     * @param string $ultimocargoexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setUltimocargoexperienciaprofissional($ultimocargoexperienciaprofissional)
    {
        $this->ultimocargoexperienciaprofissional = $ultimocargoexperienciaprofissional;

        return $this;
    }

    /**
     * Get ultimocargoexperienciaprofissional
     *
     * @return string 
     */
    public function getUltimocargoexperienciaprofissional()
    {
        return $this->ultimocargoexperienciaprofissional;
    }

    /**
     * Set ultimosalarioexperienciaprofissional
     *
     * @param float $ultimosalarioexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setUltimosalarioexperienciaprofissional($ultimosalarioexperienciaprofissional)
    {
        $this->ultimosalarioexperienciaprofissional = $ultimosalarioexperienciaprofissional;

        return $this;
    }

    /**
     * Get ultimosalarioexperienciaprofissional
     *
     * @return float 
     */
    public function getUltimosalarioexperienciaprofissional()
    {
        return $this->ultimosalarioexperienciaprofissional;
    }

    /**
     * Set dataadmissaoexperienciaprofissional
     *
     * @param \DateTime $dataadmissaoexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setDataadmissaoexperienciaprofissional($dataadmissaoexperienciaprofissional)
    {
        $this->dataadmissaoexperienciaprofissional = $dataadmissaoexperienciaprofissional;

        return $this;
    }

    /**
     * Get dataadmissaoexperienciaprofissional
     *
     * @return \DateTime 
     */
    public function getDataadmissaoexperienciaprofissional()
    {
        return $this->dataadmissaoexperienciaprofissional;
    }

    /**
     * Set datademissaoexperienciaprofissional
     *
     * @param \DateTime $datademissaoexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setDatademissaoexperienciaprofissional($datademissaoexperienciaprofissional)
    {
        $this->datademissaoexperienciaprofissional = $datademissaoexperienciaprofissional;

        return $this;
    }

    /**
     * Get datademissaoexperienciaprofissional
     *
     * @return \DateTime 
     */
    public function getDatademissaoexperienciaprofissional()
    {
        return $this->datademissaoexperienciaprofissional;
    }

    /**
     * Set atribuicoesexperienciaprofissional
     *
     * @param string $atribuicoesexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setAtribuicoesexperienciaprofissional($atribuicoesexperienciaprofissional)
    {
        $this->atribuicoesexperienciaprofissional = $atribuicoesexperienciaprofissional;

        return $this;
    }

    /**
     * Get atribuicoesexperienciaprofissional
     *
     * @return string 
     */
    public function getAtribuicoesexperienciaprofissional()
    {
        return $this->atribuicoesexperienciaprofissional;
    }

    /**
     * Set ultimaexperienciaprofissional
     *
     * @param boolean $ultimaexperienciaprofissional
     * @return Experienciaprofissional
     */
    public function setUltimaexperienciaprofissional($ultimaexperienciaprofissional)
    {
        $this->ultimaexperienciaprofissional = $ultimaexperienciaprofissional;

        return $this;
    }

    /**
     * Get ultimaexperienciaprofissional
     *
     * @return boolean 
     */
    public function getUltimaexperienciaprofissional()
    {
        return $this->ultimaexperienciaprofissional;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Experienciaprofissional
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
}
