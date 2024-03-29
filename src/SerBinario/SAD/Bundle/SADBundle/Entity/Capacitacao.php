<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitacao
 *
 * @ORM\Table(name="capacitacao")
 * @ORM\Entity
 */
class Capacitacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCapacitacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcapacitacao;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoCapacitacao", type="string", length=45, nullable=true)
     */
    private $tipocapacitacao;



    /**
     * Get idcapacitacao
     *
     * @return integer 
     */
    public function getIdcapacitacao()
    {
        return $this->idcapacitacao;
    }

    /**
     * Set tipocapacitacao
     *
     * @param string $tipocapacitacao
     * @return Capacitacao
     */
    public function setTipocapacitacao($tipocapacitacao)
    {
        $this->tipocapacitacao = $tipocapacitacao;

        return $this;
    }

    /**
     * Get tipocapacitacao
     *
     * @return string 
     */
    public function getTipocapacitacao()
    {
        return $this->tipocapacitacao;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
       return $this->getTipocapacitacao();
    }
}
