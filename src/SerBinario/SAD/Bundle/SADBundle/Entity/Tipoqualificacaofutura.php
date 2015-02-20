<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoqualificacaofutura
 *
 * @ORM\Table(name="tipoQualificacaoFutura")
 * @ORM\Entity
 */
class Tipoqualificacaofutura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoQualificacaoFutura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoqualificacaofutura;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoQualificacaoFutura", type="string", length=45, nullable=true)
     */
    private $tipoqualificacaofutura;



    /**
     * Get idtipoqualificacaofutura
     *
     * @return integer 
     */
    public function getIdtipoqualificacaofutura()
    {
        return $this->idtipoqualificacaofutura;
    }

    /**
     * Set tipoqualificacaofutura
     *
     * @param string $tipoqualificacaofutura
     * @return Tipoqualificacaofutura
     */
    public function setTipoqualificacaofutura($tipoqualificacaofutura)
    {
        $this->tipoqualificacaofutura = $tipoqualificacaofutura;

        return $this;
    }

    /**
     * Get tipoqualificacaofutura
     *
     * @return string 
     */
    public function getTipoqualificacaofutura()
    {
        return $this->tipoqualificacaofutura;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoqualificacaofutura();
    }
}
