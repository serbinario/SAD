<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empreendedor
 *
 * @ORM\Table(name="empreendedor")
 * @ORM\Entity
 */
class Empreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeEmpreendedor", type="string", length=50, nullable=true)
     */
    private $nomeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="enderecoResidencial", type="string", length=50, nullable=true)
     */
    private $enderecoresidencial;

    /**
     * @var integer
     *
     * @ORM\Column(name="idadeEmpreendedor", type="integer", nullable=true)
     */
    private $idadeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="expeProfissionalEmpreendedor", type="string", length=50, nullable=true)
     */
    private $expeprofissionalempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="tempoExpeProfissionalEmpreendedor", type="string", length=45, nullable=true)
     */
    private $tempoexpeprofissionalempreendedor;

    /**
     * @var float
     *
     * @ORM\Column(name="outraRendaEmpreendedor", type="float", precision=10, scale=0, nullable=true)
     */
    private $outrarendaempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="interesseCursoProfEmpreendedor", type="string", length=50, nullable=true)
     */
    private $interessecursoprofempreendedor;



    /**
     * Get idempreendedor
     *
     * @return integer 
     */
    public function getIdempreendedor()
    {
        return $this->idempreendedor;
    }

    /**
     * Set nomeempreendedor
     *
     * @param string $nomeempreendedor
     * @return Empreendedor
     */
    public function setNomeempreendedor($nomeempreendedor)
    {
        $this->nomeempreendedor = $nomeempreendedor;

        return $this;
    }

    /**
     * Get nomeempreendedor
     *
     * @return string 
     */
    public function getNomeempreendedor()
    {
        return $this->nomeempreendedor;
    }

    /**
     * Set enderecoresidencial
     *
     * @param string $enderecoresidencial
     * @return Empreendedor
     */
    public function setEnderecoresidencial($enderecoresidencial)
    {
        $this->enderecoresidencial = $enderecoresidencial;

        return $this;
    }

    /**
     * Get enderecoresidencial
     *
     * @return string 
     */
    public function getEnderecoresidencial()
    {
        return $this->enderecoresidencial;
    }

    /**
     * Set idadeempreendedor
     *
     * @param integer $idadeempreendedor
     * @return Empreendedor
     */
    public function setIdadeempreendedor($idadeempreendedor)
    {
        $this->idadeempreendedor = $idadeempreendedor;

        return $this;
    }

    /**
     * Get idadeempreendedor
     *
     * @return integer 
     */
    public function getIdadeempreendedor()
    {
        return $this->idadeempreendedor;
    }

    /**
     * Set expeprofissionalempreendedor
     *
     * @param string $expeprofissionalempreendedor
     * @return Empreendedor
     */
    public function setExpeprofissionalempreendedor($expeprofissionalempreendedor)
    {
        $this->expeprofissionalempreendedor = $expeprofissionalempreendedor;

        return $this;
    }

    /**
     * Get expeprofissionalempreendedor
     *
     * @return string 
     */
    public function getExpeprofissionalempreendedor()
    {
        return $this->expeprofissionalempreendedor;
    }

    /**
     * Set tempoexpeprofissionalempreendedor
     *
     * @param string $tempoexpeprofissionalempreendedor
     * @return Empreendedor
     */
    public function setTempoexpeprofissionalempreendedor($tempoexpeprofissionalempreendedor)
    {
        $this->tempoexpeprofissionalempreendedor = $tempoexpeprofissionalempreendedor;

        return $this;
    }

    /**
     * Get tempoexpeprofissionalempreendedor
     *
     * @return string 
     */
    public function getTempoexpeprofissionalempreendedor()
    {
        return $this->tempoexpeprofissionalempreendedor;
    }

    /**
     * Set outrarendaempreendedor
     *
     * @param float $outrarendaempreendedor
     * @return Empreendedor
     */
    public function setOutrarendaempreendedor($outrarendaempreendedor)
    {
        $this->outrarendaempreendedor = $outrarendaempreendedor;

        return $this;
    }

    /**
     * Get outrarendaempreendedor
     *
     * @return float 
     */
    public function getOutrarendaempreendedor()
    {
        return $this->outrarendaempreendedor;
    }

    /**
     * Set interessecursoprofempreendedor
     *
     * @param string $interessecursoprofempreendedor
     * @return Empreendedor
     */
    public function setInteressecursoprofempreendedor($interessecursoprofempreendedor)
    {
        $this->interessecursoprofempreendedor = $interessecursoprofempreendedor;

        return $this;
    }

    /**
     * Get interessecursoprofempreendedor
     *
     * @return string 
     */
    public function getInteressecursoprofempreendedor()
    {
        return $this->interessecursoprofempreendedor;
    }
}
