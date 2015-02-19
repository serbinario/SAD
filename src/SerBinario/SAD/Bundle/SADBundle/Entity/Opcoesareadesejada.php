<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opcoesareadesejada
 *
 * @ORM\Table(name="opcoesAreaDesejada", indexes={@ORM\Index(name="fk_opcoesAreaDesejada_informacoesBusca1_idx", columns={"informacoesBusca_idInformacoesBusca"})})
 * @ORM\Entity
 */
class Opcoesareadesejada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idOpcoesAreaDesejada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idopcoesareadesejada;

    /**
     * @var string
     *
     * @ORM\Column(name="opcaoAreaDesejada", type="string", length=45, nullable=true)
     */
    private $opcaoareadesejada;

    /**
     * @var string
     *
     * @ORM\Column(name="cagoOpcaoAreaDesejada", type="string", length=45, nullable=true)
     */
    private $cagoopcaoareadesejada;

    /**
     * @var \Informacoesbusca
     *
     * @ORM\ManyToOne(targetEntity="Informacoesbusca", inversedBy="Informacoesbusca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="informacoesBusca_idInformacoesBusca", referencedColumnName="idInformacoesBusca")
     * })
     */
    private $informacoesbuscainformacoesbusca;



    /**
     * Get idopcoesareadesejada
     *
     * @return integer 
     */
    public function getIdopcoesareadesejada()
    {
        return $this->idopcoesareadesejada;
    }

    /**
     * Set opcaoareadesejada
     *
     * @param string $opcaoareadesejada
     * @return Opcoesareadesejada
     */
    public function setOpcaoareadesejada($opcaoareadesejada)
    {
        $this->opcaoareadesejada = $opcaoareadesejada;

        return $this;
    }

    /**
     * Get opcaoareadesejada
     *
     * @return string 
     */
    public function getOpcaoareadesejada()
    {
        return $this->opcaoareadesejada;
    }

    /**
     * Set cagoopcaoareadesejada
     *
     * @param string $cagoopcaoareadesejada
     * @return Opcoesareadesejada
     */
    public function setCagoopcaoareadesejada($cagoopcaoareadesejada)
    {
        $this->cagoopcaoareadesejada = $cagoopcaoareadesejada;

        return $this;
    }

    /**
     * Get cagoopcaoareadesejada
     *
     * @return string 
     */
    public function getCagoopcaoareadesejada()
    {
        return $this->cagoopcaoareadesejada;
    }

    /**
     * Set informacoesbuscainformacoesbusca
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca $informacoesbuscainformacoesbusca
     * @return Opcoesareadesejada
     */
    public function setInformacoesbuscainformacoesbusca(\SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca $informacoesbuscainformacoesbusca = null)
    {
        $this->informacoesbuscainformacoesbusca = $informacoesbuscainformacoesbusca;

        return $this;
    }

    /**
     * Get informacoesbuscainformacoesbusca
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca 
     */
    public function getInformacoesbuscainformacoesbusca()
    {
        return $this->informacoesbuscainformacoesbusca;
    }
}
