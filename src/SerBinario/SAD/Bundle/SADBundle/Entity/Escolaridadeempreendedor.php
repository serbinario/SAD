<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escolaridadeempreendedor
 *
 * @ORM\Table(name="escolaridadeEmpreendedor")
 * @ORM\Entity
 */
class Escolaridadeempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEscolaridadeEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idescolaridadeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="escolaridadeEmpreendedor", type="string", length=45, nullable=true)
     */
    private $escolaridadeempreendedor;


    /**
     * Get idescolaridadeempreendedor
     *
     * @return integer 
     */
    public function getIdescolaridadeempreendedor()
    {
        return $this->idescolaridadeempreendedor;
    }

    /**
     * Set escolaridadeempreendedor
     *
     * @param string $escolaridadeempreendedor
     * @return Escolaridadeempreendedor
     */
    public function setEscolaridadeempreendedor($escolaridadeempreendedor)
    {
        $this->escolaridadeempreendedor = $escolaridadeempreendedor;

        return $this;
    }

    /**
     * Get escolaridadeempreendedor
     *
     * @return string 
     */
    public function getEscolaridadeempreendedor()
    {
        return $this->escolaridadeempreendedor;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getEscolaridadeempreendedor();
    }
}
