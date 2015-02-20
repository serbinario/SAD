<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rendafamiliarempreendedor
 *
 * @ORM\Table(name="rendaFamiliarEmpreendedor")
 * @ORM\Entity
 */
class Rendafamiliarempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRendaFamiliarEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrendafamiliarempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoRendaEmpreendedor", type="string", nullable=true)
     */
    private $tipoRenda;

    /**
     * Get idrendafamiliarempreendedor
     *
     * @return integer 
     */
    public function getIdrendafamiliarempreendedor()
    {
        return $this->idrendafamiliarempreendedor;
    }

    /**
     * 
     * @return type
     */
    public function getTipoRenda() 
    {
        return $this->tipoRenda;
    }
    
    /**
     * 
     * @param type $tipoRenda
     */
    public function setTipoRenda($tipoRenda) 
    {
        $this->tipoRenda = $tipoRenda;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoRenda();
    }
}
