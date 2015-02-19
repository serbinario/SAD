<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rendafamiliarempreendedor
 *
 * @ORM\Table(name="rendaFamiliarEmpreendedor", indexes={@ORM\Index(name="fk_rendaFamiliar_empreendedor1_idx", columns={"empreendedor_idEmpreendedor"})})
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
     * @var boolean
     *
     * @ORM\Column(name="negociosEmpreendedor", type="boolean", nullable=true)
     */
    private $negociosempreendedor;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esposaEmpreendedor", type="boolean", nullable=true)
     */
    private $esposaempreendedor;

    /**
     * @var boolean
     *
     * @ORM\Column(name="filhosEmpreendedor", type="boolean", nullable=true)
     */
    private $filhosempreendedor;

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
     * Get idrendafamiliarempreendedor
     *
     * @return integer 
     */
    public function getIdrendafamiliarempreendedor()
    {
        return $this->idrendafamiliarempreendedor;
    }

    /**
     * Set negociosempreendedor
     *
     * @param boolean $negociosempreendedor
     * @return Rendafamiliarempreendedor
     */
    public function setNegociosempreendedor($negociosempreendedor)
    {
        $this->negociosempreendedor = $negociosempreendedor;

        return $this;
    }

    /**
     * Get negociosempreendedor
     *
     * @return boolean 
     */
    public function getNegociosempreendedor()
    {
        return $this->negociosempreendedor;
    }

    /**
     * Set esposaempreendedor
     *
     * @param boolean $esposaempreendedor
     * @return Rendafamiliarempreendedor
     */
    public function setEsposaempreendedor($esposaempreendedor)
    {
        $this->esposaempreendedor = $esposaempreendedor;

        return $this;
    }

    /**
     * Get esposaempreendedor
     *
     * @return boolean 
     */
    public function getEsposaempreendedor()
    {
        return $this->esposaempreendedor;
    }

    /**
     * Set filhosempreendedor
     *
     * @param boolean $filhosempreendedor
     * @return Rendafamiliarempreendedor
     */
    public function setFilhosempreendedor($filhosempreendedor)
    {
        $this->filhosempreendedor = $filhosempreendedor;

        return $this;
    }

    /**
     * Get filhosempreendedor
     *
     * @return boolean 
     */
    public function getFilhosempreendedor()
    {
        return $this->filhosempreendedor;
    }

    /**
     * Set empreendedorempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor
     * @return Rendafamiliarempreendedor
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
