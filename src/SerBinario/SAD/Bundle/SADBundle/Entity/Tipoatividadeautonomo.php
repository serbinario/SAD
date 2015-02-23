<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoatividadeautonomo
 *
 * @ORM\Table(name="tipoAtividadeAutonomo")
 * @ORM\Entity
 */
class Tipoatividadeautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoAtividadeAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoatividadeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoAtividadeAutonomo", type="string", length=45, nullable=true)
     */
    private $tipoatividadeautonomo;



    /**
     * Get idtipoatividadeautonomo
     *
     * @return integer 
     */
    public function getIdtipoatividadeautonomo()
    {
        return $this->idtipoatividadeautonomo;
    }

    /**
     * Set tipoatividadeautonomo
     *
     * @param string $tipoatividadeautonomo
     * @return Tipoatividadeautonomo
     */
    public function setTipoatividadeautonomo($tipoatividadeautonomo)
    {
        $this->tipoatividadeautonomo = $tipoatividadeautonomo;

        return $this;
    }

    /**
     * Get tipoatividadeautonomo
     *
     * @return string 
     */
    public function getTipoatividadeautonomo()
    {
        return $this->tipoatividadeautonomo;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoatividadeautonomo();
    }
}
