<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escolaridadeempreendedor
 *
 * @ORM\Table(name="escolaridadeEmpreendedor", indexes={@ORM\Index(name="fk_escolaridade_empreendedor1_idx", columns={"empreendedor_idEmpreendedor"})})
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
     * @var \Empreendedor
     *
     * @ORM\ManyToOne(targetEntity="Empreendedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empreendedor_idEmpreendedor", referencedColumnName="idEmpreendedor")
     * })
     */
    private $empreendedorempreendedor;



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
     * Set empreendedorempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor
     * @return Escolaridadeempreendedor
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
