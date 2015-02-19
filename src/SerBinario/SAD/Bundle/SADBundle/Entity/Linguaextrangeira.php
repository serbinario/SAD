<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Linguaextrangeira
 *
 * @ORM\Table(name="linguaExtrangeira", indexes={@ORM\Index(name="fk_cursos_curriculo1_idx", columns={"curriculo_idCurriculo"}), @ORM\Index(name="fk_linguaExtrangeira_tipoLinguaExtrangeira1_idx", columns={"tipoLinguaExtrangeira_idLinguaExtrangeira"})})
 * @ORM\Entity
 */
class Linguaextrangeira
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLinguaExtrangeira", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlinguaextrangeira;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nocaoLinguaExtrangeira", type="boolean", nullable=true)
     */
    private $nocaolinguaextrangeira;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fluenciaLinguaExtrangeira", type="boolean", nullable=true)
     */
    private $fluencialinguaextrangeira;

    /**
     * @var boolean
     *
     * @ORM\Column(name="redacaoLinguaExtrangeira", type="boolean", nullable=true)
     */
    private $redacaolinguaextrangeira;

    /**
     * @var boolean
     *
     * @ORM\Column(name="traducaoLinguaExtrangeira", type="boolean", nullable=true)
     */
    private $traducaolinguaextrangeira;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="linguasExtrangeiras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;

    /**
     * @var \Tipolinguaextrangeira
     *
     * @ORM\ManyToOne(targetEntity="Tipolinguaextrangeira")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoLinguaExtrangeira_idLinguaExtrangeira", referencedColumnName="idLinguaExtrangeira")
     * })
     */
    private $tipolinguaextrangeiralinguaextrangeira;



    /**
     * Get idlinguaextrangeira
     *
     * @return integer 
     */
    public function getIdlinguaextrangeira()
    {
        return $this->idlinguaextrangeira;
    }

    /**
     * Set nocaolinguaextrangeira
     *
     * @param boolean $nocaolinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setNocaolinguaextrangeira($nocaolinguaextrangeira)
    {
        $this->nocaolinguaextrangeira = $nocaolinguaextrangeira;

        return $this;
    }

    /**
     * Get nocaolinguaextrangeira
     *
     * @return boolean 
     */
    public function getNocaolinguaextrangeira()
    {
        return $this->nocaolinguaextrangeira;
    }

    /**
     * Set fluencialinguaextrangeira
     *
     * @param boolean $fluencialinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setFluencialinguaextrangeira($fluencialinguaextrangeira)
    {
        $this->fluencialinguaextrangeira = $fluencialinguaextrangeira;

        return $this;
    }

    /**
     * Get fluencialinguaextrangeira
     *
     * @return boolean 
     */
    public function getFluencialinguaextrangeira()
    {
        return $this->fluencialinguaextrangeira;
    }

    /**
     * Set redacaolinguaextrangeira
     *
     * @param boolean $redacaolinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setRedacaolinguaextrangeira($redacaolinguaextrangeira)
    {
        $this->redacaolinguaextrangeira = $redacaolinguaextrangeira;

        return $this;
    }

    /**
     * Get redacaolinguaextrangeira
     *
     * @return boolean 
     */
    public function getRedacaolinguaextrangeira()
    {
        return $this->redacaolinguaextrangeira;
    }

    /**
     * Set traducaolinguaextrangeira
     *
     * @param boolean $traducaolinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setTraducaolinguaextrangeira($traducaolinguaextrangeira)
    {
        $this->traducaolinguaextrangeira = $traducaolinguaextrangeira;

        return $this;
    }

    /**
     * Get traducaolinguaextrangeira
     *
     * @return boolean 
     */
    public function getTraducaolinguaextrangeira()
    {
        return $this->traducaolinguaextrangeira;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Linguaextrangeira
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
     * Set tipolinguaextrangeiralinguaextrangeira
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira $tipolinguaextrangeiralinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setTipolinguaextrangeiralinguaextrangeira(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira $tipolinguaextrangeiralinguaextrangeira = null)
    {
        $this->tipolinguaextrangeiralinguaextrangeira = $tipolinguaextrangeiralinguaextrangeira;

        return $this;
    }

    /**
     * Get tipolinguaextrangeiralinguaextrangeira
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira 
     */
    public function getTipolinguaextrangeiralinguaextrangeira()
    {
        return $this->tipolinguaextrangeiralinguaextrangeira;
    }
}
