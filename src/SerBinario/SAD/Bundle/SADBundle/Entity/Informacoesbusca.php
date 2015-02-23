<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerBinario\SAD\Bundle\SADBundle\Entity\Opcoesareadesejada;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Informacoesbusca
 *
 * @ORM\Table(name="informacoesBusca")
 * @ORM\Entity
 */
class Informacoesbusca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idInformacoesBusca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinformacoesbusca;

    /**
     * @var \Tipohorario
     *
     * @ORM\ManyToOne(targetEntity="Tipohorario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoHorario", referencedColumnName="idTipoHorario")
     * })
     */
    private $tipohorariotipohorario;

    /**
     * @var \Tiponivelherarquico
     *
     * @ORM\ManyToOne(targetEntity="Tiponivelherarquico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoNivelHerarquico_idTipoNivelHerarquico", referencedColumnName="idTipoNivelHerarquico")
     * })
     */
    private $tiponivelherarquicotiponivelherarquico;

    /**
     * @var \Curriculo
     *
     * @ORM\OneToOne(targetEntity="Curriculo", inversedBy="informacaoBusca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Opcoesareadesejada", mappedBy="informacoesbuscainformacoesbusca", cascade={"all"})
     */
    private $opcoesdesejadas;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->opcoesdesejadas = new ArrayCollection();
    }


    /**
     * Get idinformacoesbusca
     *
     * @return integer 
     */
    public function getIdinformacoesbusca()
    {
        return $this->idinformacoesbusca;
    }

    /**
     * Set tiponivelherarquicotiponivelherarquico
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico $tiponivelherarquicotiponivelherarquico
     * @return Informacoesbusca
     */
    public function setTiponivelherarquicotiponivelherarquico(\SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico $tiponivelherarquicotiponivelherarquico = null)
    {
        $this->tiponivelherarquicotiponivelherarquico = $tiponivelherarquicotiponivelherarquico;

        return $this;
    }

    /**
     * Get tiponivelherarquicotiponivelherarquico
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico 
     */
    public function getTiponivelherarquicotiponivelherarquico()
    {
        return $this->tiponivelherarquicotiponivelherarquico;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Informacoesbusca
     */
    public function setCurriculocurriculo(\SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo = null)
    {
        $this->curriculocurriculo = $curriculocurriculo;

        return $this;
    }

    /**
     * Get curriculocurriculo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo 
     */
    public function getCurriculocurriculo()
    {
        return $this->curriculocurriculo;
    }
    
    /**
     * 
     * @return type
     */
    public function getOpcoesdesejadas() 
    {
        return $this->opcoesdesejadas;
    }

    /**
     * 
     * @param type $opcoesdesejadas
     */
    public function setOpcoesdesejadas($opcoesdesejadas) 
    {
        foreach ($opcoesdesejadas as $opcao) {
            $opcao->setInformacoesbuscainformacoesbusca($this);
        }
        
        $this->opcoesdesejadas = $opcoesdesejadas;
    }
    
    /**
     * 
     * @param Opcoesareadesejada $opcao
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca
     */
    public function addOpcao(Opcoesareadesejada $opcao)
    {
        $opcao->setInformacoesbuscainformacoesbusca($this);        
        $this->opcoesdesejadas[] = $opcao;
        
        return $this;
    }
    
    /**
     * 
     * @return type
     */
    public function getTipohorariotipohorario() 
    {
        return $this->tipohorariotipohorario;
    }

    /**
     * 
     * @param type $tipohorariotipohorario
     */
    public function setTipohorariotipohorario($tipohorariotipohorario) 
    {
        $this->tipohorariotipohorario = $tipohorariotipohorario;
    }



    
}
