<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rendafamiliarautonomo
 *
 * @ORM\Table(name="rendaFamiliarAutonomo", indexes={@ORM\Index(name="fk_rendaFamiliarAutonomo_autonomo1_idx", columns={"autonomo_idAutonomo"})})
 * @ORM\Entity
 */
class Rendafamiliarautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRendaFamiliarAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrendafamiliarautonomo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="negociosAutonomo", type="boolean", nullable=true)
     */
    private $negociosautonomo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esposaAutonomo", type="boolean", nullable=true)
     */
    private $esposaautonomo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="filhosAutonomo", type="boolean", nullable=true)
     */
    private $filhosautonomo;

    /**
     * @var \Autonomo
     *
     * @ORM\ManyToOne(targetEntity="Autonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="autonomo_idAutonomo", referencedColumnName="idAutonomo")
     * })
     */
    private $autonomoautonomo;



    /**
     * Get idrendafamiliarautonomo
     *
     * @return integer 
     */
    public function getIdrendafamiliarautonomo()
    {
        return $this->idrendafamiliarautonomo;
    }

    /**
     * Set negociosautonomo
     *
     * @param boolean $negociosautonomo
     * @return Rendafamiliarautonomo
     */
    public function setNegociosautonomo($negociosautonomo)
    {
        $this->negociosautonomo = $negociosautonomo;

        return $this;
    }

    /**
     * Get negociosautonomo
     *
     * @return boolean 
     */
    public function getNegociosautonomo()
    {
        return $this->negociosautonomo;
    }

    /**
     * Set esposaautonomo
     *
     * @param boolean $esposaautonomo
     * @return Rendafamiliarautonomo
     */
    public function setEsposaautonomo($esposaautonomo)
    {
        $this->esposaautonomo = $esposaautonomo;

        return $this;
    }

    /**
     * Get esposaautonomo
     *
     * @return boolean 
     */
    public function getEsposaautonomo()
    {
        return $this->esposaautonomo;
    }

    /**
     * Set filhosautonomo
     *
     * @param boolean $filhosautonomo
     * @return Rendafamiliarautonomo
     */
    public function setFilhosautonomo($filhosautonomo)
    {
        $this->filhosautonomo = $filhosautonomo;

        return $this;
    }

    /**
     * Get filhosautonomo
     *
     * @return boolean 
     */
    public function getFilhosautonomo()
    {
        return $this->filhosautonomo;
    }

    /**
     * Set autonomoautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo
     * @return Rendafamiliarautonomo
     */
    public function setAutonomoautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo = null)
    {
        $this->autonomoautonomo = $autonomoautonomo;

        return $this;
    }

    /**
     * Get autonomoautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo 
     */
    public function getAutonomoautonomo()
    {
        return $this->autonomoautonomo;
    }
}
