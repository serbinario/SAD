<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiposinformatica
 *
 * @ORM\Table(name="tiposInformatica")
 * @ORM\Entity
 */
class Tiposinformatica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTiposInformatica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtiposinformatica;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoInformatica", type="string", length=45, nullable=true)
     */
    private $tipoinformatica;



    /**
     * Get idtiposinformatica
     *
     * @return integer 
     */
    public function getIdtiposinformatica()
    {
        return $this->idtiposinformatica;
    }

    /**
     * Set tipoinformatica
     *
     * @param string $tipoinformatica
     * @return Tiposinformatica
     */
    public function setTipoinformatica($tipoinformatica)
    {
        $this->tipoinformatica = $tipoinformatica;

        return $this;
    }

    /**
     * Get tipoinformatica
     *
     * @return string 
     */
    public function getTipoinformatica()
    {
        return $this->tipoinformatica;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoinformatica();
    }
}
