<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefonesempreendedor
 *
 * @ORM\Table(name="telefonesEmpreendedor", indexes={@ORM\Index(name="fk_telefones_empreendedor_idx", columns={"empreendedor_idEmpreendedor"})})
 * @ORM\Entity
 */
class Telefonesempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTelefonesEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtelefonesempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneEmpreendedor", type="string", length=15, nullable=false)
     */
    private $telefoneempreendedor;

    /**
     * @var \Empreendedor
     *
     * @ORM\ManyToOne(targetEntity="Empreendedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empreendedor_idEmpreendedor", referencedColumnName="idEmpreendedor")
     * })
     */
    private $empreendedorempreendedor;



    /**
     * Get idtelefonesempreendedor
     *
     * @return integer 
     */
    public function getIdtelefonesempreendedor()
    {
        return $this->idtelefonesempreendedor;
    }

    /**
     * Set telefoneempreendedor
     *
     * @param string $telefoneempreendedor
     * @return Telefonesempreendedor
     */
    public function setTelefoneempreendedor($telefoneempreendedor)
    {
        $this->telefoneempreendedor = $telefoneempreendedor;

        return $this;
    }

    /**
     * Get telefoneempreendedor
     *
     * @return string 
     */
    public function getTelefoneempreendedor()
    {
        return $this->telefoneempreendedor;
    }

    /**
     * Set empreendedorempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor
     * @return Telefonesempreendedor
     */
    public function setEmpreendedorempreendedor(\SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor = null)
    {
        $this->empreendedorempreendedor = $empreendedorempreendedor;

        return $this;
    }

    /**
     * Get empreendedorempreendedor
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor 
     */
    public function getEmpreendedorempreendedor()
    {
        return $this->empreendedorempreendedor;
    }
}
