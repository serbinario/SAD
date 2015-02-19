<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualificacaofutura
 *
 * @ORM\Table(name="qualificacaoFutura", indexes={@ORM\Index(name="fk_qualificacaoFutura_tipoQualificacaoFutura1_idx", columns={"tipoQualificacaoFutura_idTipoQualificacaoFutura"}), @ORM\Index(name="fk_qualificacaoFutura_curriculo1_idx", columns={"curriculo_idCurriculo"})})
 * @ORM\Entity
 */
class Qualificacaofutura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idQualificacaoFutura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idqualificacaofutura;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoQualificacaoFutura", type="string", length=50, nullable=true)
     */
    private $descricaoqualificacaofutura;

    /**
     * @var \Tipoqualificacaofutura
     *
     * @ORM\ManyToOne(targetEntity="Tipoqualificacaofutura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoQualificacaoFutura_idTipoQualificacaoFutura", referencedColumnName="idTipoQualificacaoFutura")
     * })
     */
    private $tipoqualificacaofuturatipoqualificacaofutura;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="qualificacoesFuturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;



    /**
     * Get idqualificacaofutura
     *
     * @return integer 
     */
    public function getIdqualificacaofutura()
    {
        return $this->idqualificacaofutura;
    }

    /**
     * Set descricaoqualificacaofutura
     *
     * @param string $descricaoqualificacaofutura
     * @return Qualificacaofutura
     */
    public function setDescricaoqualificacaofutura($descricaoqualificacaofutura)
    {
        $this->descricaoqualificacaofutura = $descricaoqualificacaofutura;

        return $this;
    }

    /**
     * Get descricaoqualificacaofutura
     *
     * @return string 
     */
    public function getDescricaoqualificacaofutura()
    {
        return $this->descricaoqualificacaofutura;
    }

    /**
     * Set tipoqualificacaofuturatipoqualificacaofutura
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacaofutura $tipoqualificacaofuturatipoqualificacaofutura
     * @return Qualificacaofutura
     */
    public function setTipoqualificacaofuturatipoqualificacaofutura(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacaofutura $tipoqualificacaofuturatipoqualificacaofutura = null)
    {
        $this->tipoqualificacaofuturatipoqualificacaofutura = $tipoqualificacaofuturatipoqualificacaofutura;

        return $this;
    }

    /**
     * Get tipoqualificacaofuturatipoqualificacaofutura
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacaofutura 
     */
    public function getTipoqualificacaofuturatipoqualificacaofutura()
    {
        return $this->tipoqualificacaofuturatipoqualificacaofutura;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Qualificacaofutura
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
