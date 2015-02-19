<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credito
 *
 * @ORM\Table(name="credito")
 * @ORM\Entity
 */
class Credito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCredito", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcredito;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoCredito", type="string", length=45, nullable=true)
     */
    private $tipocredito;



    /**
     * Get idcredito
     *
     * @return integer 
     */
    public function getIdcredito()
    {
        return $this->idcredito;
    }

    /**
     * Set tipocredito
     *
     * @param string $tipocredito
     * @return Credito
     */
    public function setTipocredito($tipocredito)
    {
        $this->tipocredito = $tipocredito;

        return $this;
    }

    /**
     * Get tipocredito
     *
     * @return string 
     */
    public function getTipocredito()
    {
        return $this->tipocredito;
    }
}
