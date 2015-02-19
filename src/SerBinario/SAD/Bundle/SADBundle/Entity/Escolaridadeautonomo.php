<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escolaridadeautonomo
 *
 * @ORM\Table(name="escolaridadeAutonomo", indexes={@ORM\Index(name="fk_escolaridadeAutonomo_autonomo1_idx", columns={"autonomo_idAutonomo"})})
 * @ORM\Entity
 */
class Escolaridadeautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEscolaridadeAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idescolaridadeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="escolaridadeAutonomo", type="string", length=45, nullable=true)
     */
    private $escolaridadeautonomo;

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
     * Get idescolaridadeautonomo
     *
     * @return integer 
     */
    public function getIdescolaridadeautonomo()
    {
        return $this->idescolaridadeautonomo;
    }

    /**
     * Set escolaridadeautonomo
     *
     * @param string $escolaridadeautonomo
     * @return Escolaridadeautonomo
     */
    public function setEscolaridadeautonomo($escolaridadeautonomo)
    {
        $this->escolaridadeautonomo = $escolaridadeautonomo;

        return $this;
    }

    /**
     * Get escolaridadeautonomo
     *
     * @return string 
     */
    public function getEscolaridadeautonomo()
    {
        return $this->escolaridadeautonomo;
    }

    /**
     * Set autonomoautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo
     * @return Escolaridadeautonomo
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
