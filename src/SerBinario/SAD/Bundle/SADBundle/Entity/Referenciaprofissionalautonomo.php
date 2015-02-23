<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenciaprofissionalautonomo
 *
 * @ORM\Table(name="referenciaProfissionalAutonomo", indexes={@ORM\Index(name="fk_referenciaProfissionalAutonomo_identificacaoAtividadeAut_idx", columns={"identificacaoAtividadeAutonomo_idIdentificacaoAtividadeAutonomo"})})
 * @ORM\Entity
 */
class Referenciaprofissionalautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReferenciaProfissionalAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreferenciaprofissionalautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeReferenciaProfissionalAutonomo", type="string", length=45, nullable=true)
     */
    private $nomereferenciaprofissionalautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneReferenciaProfissionalAutonomo", type="string", length=15, nullable=true)
     */
    private $telefonereferenciaprofissionalautonomo;

    /**
     * @var \Identificacaoatividadeautonomo
     *
     * @ORM\ManyToOne(targetEntity="Identificacaoatividadeautonomo", inversedBy="referenciasProfissionais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identificacaoAtividadeAutonomo_idIdentificacaoAtividadeAutonomo", referencedColumnName="idIdentificacaoAtividadeAutonomo")
     * })
     */
    private $identificacaoatividadeautonomoidentificacaoatividadeautonomo;



    /**
     * Get idreferenciaprofissionalautonomo
     *
     * @return integer 
     */
    public function getIdreferenciaprofissionalautonomo()
    {
        return $this->idreferenciaprofissionalautonomo;
    }

    /**
     * Set nomereferenciaprofissionalautonomo
     *
     * @param string $nomereferenciaprofissionalautonomo
     * @return Referenciaprofissionalautonomo
     */
    public function setNomereferenciaprofissionalautonomo($nomereferenciaprofissionalautonomo)
    {
        $this->nomereferenciaprofissionalautonomo = $nomereferenciaprofissionalautonomo;

        return $this;
    }

    /**
     * Get nomereferenciaprofissionalautonomo
     *
     * @return string 
     */
    public function getNomereferenciaprofissionalautonomo()
    {
        return $this->nomereferenciaprofissionalautonomo;
    }

    /**
     * Set telefonereferenciaprofissionalautonomo
     *
     * @param string $telefonereferenciaprofissionalautonomo
     * @return Referenciaprofissionalautonomo
     */
    public function setTelefonereferenciaprofissionalautonomo($telefonereferenciaprofissionalautonomo)
    {
        $this->telefonereferenciaprofissionalautonomo = $telefonereferenciaprofissionalautonomo;

        return $this;
    }

    /**
     * Get telefonereferenciaprofissionalautonomo
     *
     * @return string 
     */
    public function getTelefonereferenciaprofissionalautonomo()
    {
        return $this->telefonereferenciaprofissionalautonomo;
    }

    /**
     * Set identificacaoatividadeautonomoidentificacaoatividadeautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeautonomo $identificacaoatividadeautonomoidentificacaoatividadeautonomo
     * @return Referenciaprofissionalautonomo
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
