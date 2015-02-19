<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autonomo
 *
 * @ORM\Table(name="autonomo")
 * @ORM\Entity
 */
class Autonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeAutonomo", type="string", length=50, nullable=true)
     */
    private $nomeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="enderecoAutonomo", type="string", length=50, nullable=true)
     */
    private $enderecoautonomo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idadeAutonomo", type="integer", nullable=true)
     */
    private $idadeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="expeProfissionalAutonomo", type="string", length=50, nullable=true)
     */
    private $expeprofissionalautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="tempoExpeProfissionalAutonomo", type="string", length=45, nullable=true)
     */
    private $tempoexpeprofissionalautonomo;

    /**
     * @var float
     *
     * @ORM\Column(name="outraRendaAutonomo", type="float", precision=10, scale=0, nullable=true)
     */
    private $outrarendaautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="interesseCursoProfAutonomo", type="string", length=50, nullable=true)
     */
    private $interessecursoprofautonomo;



    /**
     * Get idautonomo
     *
     * @return integer 
     */
    public function getIdautonomo()
    {
        return $this->idautonomo;
    }

    /**
     * Set nomeautonomo
     *
     * @param string $nomeautonomo
     * @return Autonomo
     */
    public function setNomeautonomo($nomeautonomo)
    {
        $this->nomeautonomo = $nomeautonomo;

        return $this;
    }

    /**
     * Get nomeautonomo
     *
     * @return string 
     */
    public function getNomeautonomo()
    {
        return $this->nomeautonomo;
    }

    /**
     * Set enderecoautonomo
     *
     * @param string $enderecoautonomo
     * @return Autonomo
     */
    public function setEnderecoautonomo($enderecoautonomo)
    {
        $this->enderecoautonomo = $enderecoautonomo;

        return $this;
    }

    /**
     * Get enderecoautonomo
     *
     * @return string 
     */
    public function getEnderecoautonomo()
    {
        return $this->enderecoautonomo;
    }

    /**
     * Set idadeautonomo
     *
     * @param integer $idadeautonomo
     * @return Autonomo
     */
    public function setIdadeautonomo($idadeautonomo)
    {
        $this->idadeautonomo = $idadeautonomo;

        return $this;
    }

    /**
     * Get idadeautonomo
     *
     * @return integer 
     */
    public function getIdadeautonomo()
    {
        return $this->idadeautonomo;
    }

    /**
     * Set expeprofissionalautonomo
     *
     * @param string $expeprofissionalautonomo
     * @return Autonomo
     */
    public function setExpeprofissionalautonomo($expeprofissionalautonomo)
    {
        $this->expeprofissionalautonomo = $expeprofissionalautonomo;

        return $this;
    }

    /**
     * Get expeprofissionalautonomo
     *
     * @return string 
     */
    public function getExpeprofissionalautonomo()
    {
        return $this->expeprofissionalautonomo;
    }

    /**
     * Set tempoexpeprofissionalautonomo
     *
     * @param string $tempoexpeprofissionalautonomo
     * @return Autonomo
     */
    public function setTempoexpeprofissionalautonomo($tempoexpeprofissionalautonomo)
    {
        $this->tempoexpeprofissionalautonomo = $tempoexpeprofissionalautonomo;

        return $this;
    }

    /**
     * Get tempoexpeprofissionalautonomo
     *
     * @return string 
     */
    public function getTempoexpeprofissionalautonomo()
    {
        return $this->tempoexpeprofissionalautonomo;
    }

    /**
     * Set outrarendaautonomo
     *
     * @param float $outrarendaautonomo
     * @return Autonomo
     */
    public function setOutrarendaautonomo($outrarendaautonomo)
    {
        $this->outrarendaautonomo = $outrarendaautonomo;

        return $this;
    }

    /**
     * Get outrarendaautonomo
     *
     * @return float 
     */
    public function getOutrarendaautonomo()
    {
        return $this->outrarendaautonomo;
    }

    /**
     * Set interessecursoprofautonomo
     *
     * @param string $interessecursoprofautonomo
     * @return Autonomo
     */
    public function setInteressecursoprofautonomo($interessecursoprofautonomo)
    {
        $this->interessecursoprofautonomo = $interessecursoprofautonomo;

        return $this;
    }

    /**
     * Get interessecursoprofautonomo
     *
     * @return string 
     */
    public function getInteressecursoprofautonomo()
    {
        return $this->interessecursoprofautonomo;
    }
}
