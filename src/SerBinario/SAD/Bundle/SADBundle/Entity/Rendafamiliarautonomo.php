<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rendafamiliarautonomo
 *
 * @ORM\Table(name="rendaFamiliarAutonomo")
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
     *
     * @ORM\Column(name="tipoRendaFamiliar", type="string", nullable=true)
     */
    private $tipoRendaFamiliar;

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
     * 
     * @return type
     */
    public function getTipoRendaFamiliar()
    {
        return $this->tipoRendaFamiliar;
    }

    /**
     * 
     * @param type $tipoRendaFamiliar
     */
    public function setTipoRendaFamiliar($tipoRendaFamiliar) 
    {
        $this->tipoRendaFamiliar = $tipoRendaFamiliar;
    }
    
    /**
     * 
     */
    public function __toString() 
    {
        return $this->getTipoRendaFamiliar();
    }
}