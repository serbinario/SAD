<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escolaridadeautonomo
 *
 * @ORM\Table(name="escolaridadeAutonomo")
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
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getEscolaridadeautonomo();
    }
}
