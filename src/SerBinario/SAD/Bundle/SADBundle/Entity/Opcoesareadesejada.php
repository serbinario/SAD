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
     * @var \AreaDesejada
     *
     * @ORM\OneToMany(targetEntity="AreaDesejada", mappedBy="opcaoDesejada", cascade={"all"})
     */
    private $areaDesejada;

    /**
     * @var \Funcao
     *
     * @ORM\OneToMany(targetEntity="Funcao", mappedBy="opcaoDesejada", cascade={"all"})
     */
    private $funcao;

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
     * 
     * @return type
     */
    function getIdopcoesareadesejada() {
        return $this->idopcoesareadesejada;
    }
    
    /**
     * 
     * @return type
     */
    function getAreaDesejada() {
        return $this->areaDesejada;
    }
    
    /**
     * 
     * @return type
     */
    function getFuncao() {
        return $this->funcao;
    }
    
    /**
     * 
     * @param type $idopcoesareadesejada
     */
    function setIdopcoesareadesejada($idopcoesareadesejada) {
        $this->idopcoesareadesejada = $idopcoesareadesejada;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada $areaDesejada
     */
    function setAreaDesejada(AreaDesejada $areaDesejada) {
        $this->areaDesejada = $areaDesejada;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Funcao $funcao
     */
    function setFuncao(Funcao $funcao) {
        $this->funcao = $funcao;
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
