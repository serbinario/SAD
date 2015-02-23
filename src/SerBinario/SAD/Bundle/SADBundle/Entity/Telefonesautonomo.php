<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefonesautonomo
 *
 * @ORM\Table(name="telefonesAutonomo", indexes={@ORM\Index(name="fk_telefonesAutonomo_autonomo1_idx", columns={"autonomo_idAutonomo"})})
 * @ORM\Entity
 */
class Telefonesautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTelefonesAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtelefonesautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneAutonomo", type="string", length=15, nullable=false)
     */
    private $telefoneautonomo;

    /**
     * @var \Autonomo
     *
     * @ORM\ManyToOne(targetEntity="Autonomo", inversedBy="telefones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="autonomo_idAutonomo", referencedColumnName="idAutonomo")
     * })
     */
    private $autonomoautonomo;



    /**
     * Get idtelefonesautonomo
     *
     * @return integer 
     */
    public function getIdtelefonesautonomo()
    {
        return $this->idtelefonesautonomo;
    }

    /**
     * Set telefoneautonomo
     *
     * @param string $telefoneautonomo
     * @return Telefonesautonomo
     */
    public function setTelefoneautonomo($telefoneautonomo)
    {
        $this->telefoneautonomo = $telefoneautonomo;

        return $this;
    }

    /**
     * Get telefoneautonomo
     *
     * @return string 
     */
    public function getTelefoneautonomo()
    {
        return $this->telefoneautonomo;
    }

    /**
     * Set autonomoautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo
     * @return Telefonesautonomo
     */
    public function setAutonomoautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo = null)
    {
        $this->autonomoautonomo = $autonomoautonomo;

        return $this;
    }

    /**
     * Get autonomoautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo 
     */
    public function getAutonomoautonomo()
    {
        return $this->autonomoautonomo;
    }
}
