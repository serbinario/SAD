<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ramoatividadeautonomo
 *
 * @ORM\Table(name="ramoAtividadeAutonomo", indexes={@ORM\Index(name="fk_ramoAtividadeAutonomo_identificacaoAtividadeAutonomo1_idx", columns={"identificacaoAtividadeAutonomo_idIdentificacaoAtividadeAutonomo"})})
 * @ORM\Entity
 */
class Ramoatividadeautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRamoAtividadeAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idramoatividadeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="ramoAtividadeAutonomo", type="string", length=45, nullable=true)
     */
    private $ramoatividadeautonomo;

    /**
     * @var \Identificacaoatividadeautonomo
     *
     * @ORM\ManyToOne(targetEntity="Identificacaoatividadeautonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identificacaoAtividadeAutonomo_idIdentificacaoAtividadeAutonomo", referencedColumnName="idIdentificacaoAtividadeAutonomo")
     * })
     */
    private $identificacaoatividadeautonomoidentificacaoatividadeautonomo;



    /**
     * Get idramoatividadeautonomo
     *
     * @return integer 
     */
    public function getIdramoatividadeautonomo()
    {
        return $this->idramoatividadeautonomo;
    }

    /**
     * Set ramoatividadeautonomo
     *
     * @param string $ramoatividadeautonomo
     * @return Ramoatividadeautonomo
     */
    public function setRamoatividadeautonomo($ramoatividadeautonomo)
    {
        $this->ramoatividadeautonomo = $ramoatividadeautonomo;

        return $this;
    }

    /**
     * Get ramoatividadeautonomo
     *
     * @return string 
     */
    public function getRamoatividadeautonomo()
    {
        return $this->ramoatividadeautonomo;
    }

    /**
     * Set identificacaoatividadeautonomoidentificacaoatividadeautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeautonomo $identificacaoatividadeautonomoidentificacaoatividadeautonomo
     * @return Ramoatividadeautonomo
     */
    public function setIdentificacaoatividadeautonomoidentificacaoatividadeautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeautonomo $identificacaoatividadeautonomoidentificacaoatividadeautonomo = null)
    {
        $this->identificacaoatividadeautonomoidentificacaoatividadeautonomo = $identificacaoatividadeautonomoidentificacaoatividadeautonomo;

        return $this;
    }

    /**
     * Get identificacaoatividadeautonomoidentificacaoatividadeautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeautonomo 
     */
    public function getIdentificacaoatividadeautonomoidentificacaoatividadeautonomo()
    {
        return $this->identificacaoatividadeautonomoidentificacaoatividadeautonomo;
    }
}
