<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoatividadeempreendedor
 *
 * @ORM\Table(name="tipoAtividadeEmpreendedor")
 * @ORM\Entity
 */
class Tipoatividadeempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoAtividadeEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoatividadeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoAtividadeEmpreendedor", type="string", length=45, nullable=true)
     */
    private $tipoatividadeempreendedor;



    /**
     * Get idtipoatividadeempreendedor
     *
     * @return integer 
     */
    public function getIdtipoatividadeempreendedor()
    {
        return $this->idtipoatividadeempreendedor;
    }

    /**
     * Set tipoatividadeempreendedor
     *
     * @param string $tipoatividadeempreendedor
     * @return Tipoatividadeempreendedor
     */
    public function setTipoatividadeempreendedor($tipoatividadeempreendedor)
    {
        $this->tipoatividadeempreendedor = $tipoatividadeempreendedor;

        return $this;
    }

    /**
     * Get tipoatividadeempreendedor
     *
     * @return string 
     */
    public function getTipoatividadeempreendedor()
    {
        return $this->tipoatividadeempreendedor;
    }
}
