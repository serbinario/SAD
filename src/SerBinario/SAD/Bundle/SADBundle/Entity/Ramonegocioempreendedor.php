<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ramonegocioempreendedor
 *
 * @ORM\Table(name="ramoNegocioEmpreendedor")
 * @ORM\Entity
 */
class Ramonegocioempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRamoNegocioEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idramonegocioempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="ramoNegocioEmpreendedor", type="string", length=45, nullable=true)
     */
    private $ramonegocioempreendedor;



    /**
     * Get idramonegocioempreendedor
     *
     * @return integer 
     */
    public function getIdramonegocioempreendedor()
    {
        return $this->idramonegocioempreendedor;
    }

    /**
     * Set ramonegocioempreendedor
     *
     * @param string $ramonegocioempreendedor
     * @return Ramonegocioempreendedor
     */
    public function setRamonegocioempreendedor($ramonegocioempreendedor)
    {
        $this->ramonegocioempreendedor = $ramonegocioempreendedor;

        return $this;
    }

    /**
     * Get ramonegocioempreendedor
     *
     * @return string 
     */
    public function getRamonegocioempreendedor()
    {
        return $this->ramonegocioempreendedor;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getRamonegocioempreendedor();
    }
}
