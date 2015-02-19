<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiponivelherarquico
 *
 * @ORM\Table(name="tipoNivelHerarquico")
 * @ORM\Entity
 */
class Tiponivelherarquico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoNivelHerarquico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtiponivelherarquico;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoNivelHerarquico", type="string", length=45, nullable=true)
     */
    private $tiponivelherarquico;



    /**
     * Get idtiponivelherarquico
     *
     * @return integer 
     */
    public function getIdtiponivelherarquico()
    {
        return $this->idtiponivelherarquico;
    }

    /**
     * Set tiponivelherarquico
     *
     * @param string $tiponivelherarquico
     * @return Tiponivelherarquico
     */
    public function setTiponivelherarquico($tiponivelherarquico)
    {
        $this->tiponivelherarquico = $tiponivelherarquico;

        return $this;
    }

    /**
     * Get tiponivelherarquico
     *
     * @return string 
     */
    public function getTiponivelherarquico()
    {
        return $this->tiponivelherarquico;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTiponivelherarquico();
    }
}
