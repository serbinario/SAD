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
     * @ORM\ManyToMany(targetEntity="Tipohorario", inversedBy="informBusca", cascade={"persist"})
     * @ORM\JoinTable(name="tipohorario_groups", 
     *      joinColumns={@ORM\JoinColumn(name="inform_id", referencedColumnName="idInformacoesBusca")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tipo_horario_id", referencedColumnName="idTipoHorario")}
     * )
     */
    private $tipohorariotipohorario;

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
        return $this->opcoesdesejadas->toArray();
    }

    /**
     * 
     * @param type $opcoesdesejadas
     */
    public function setOpcoesdesejadas($opcoesdesejadas) 
    {
        if(count($opcoesdesejadas) > 0) {
            foreach ($opcoesdesejadas as $opcao) {
                $opcao->setInformacoesbuscainformacoesbusca($this);
            }
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
