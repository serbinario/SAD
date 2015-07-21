<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerBinario\SAD\Bundle\SADBundle\Entity\Formacao;
use SerBinario\SAD\Bundle\SADBundle\Entity\Experienciaprofissional;
use SerBinario\SAD\Bundle\SADBundle\Entity\Informatica;
use SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca;

/**
 * Curriculo
 *
 * @ORM\Table(name="curriculo", indexes={@ORM\Index(name="fk_curriculo_candidato1_idx", columns={"candidato_idCandidato"})})
 * @ORM\Entity
 */
class Curriculo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCurriculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcurriculo;

    /**
     * @var string
     *
     * @ORM\Column(name="resumoCurriculo", type="text", nullable=true)
     */
    private $resumocurriculo;

    /**
     * @var float
     *
     * @ORM\Column(name="prentencaoSalarialCurriculo", type="float", precision=10, scale=0, nullable=true)
     */
    private $prentencaosalarialcurriculo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="atualmenteEmpregadoCurriculo", type="boolean", nullable=true)
     */
    private $atualmenteempregadocurriculo;

    /**
     * @var \Candidato
     *
     * @ORM\ManyToOne(targetEntity="Candidato", inversedBy="curriculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidato_idCandidato", referencedColumnName="idCandidato")
     * })
     */
    private $candidatocandidato;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Formacao", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $formacoes;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Experienciaprofissional", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $experienciasProfissionais;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Linguaextrangeira", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $linguasExtrangeiras;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Informatica", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $informatica;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="OutrosCursos", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $outrosCursos;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Qualificacaofutura", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $qualificacoesFuturas;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Informacoesbusca", mappedBy="curriculocurriculo", cascade={"persist"})
     */
    private $informacaoBusca;
    
    /**
     * Método construtor
     */
    public function __construct()
    {        
        $this->experienciasProfissionais = new \Doctrine\Common\Collections\ArrayCollection();
        $this->linguasExtrangeiras       = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formacoes                 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->informatica               = new \Doctrine\Common\Collections\ArrayCollection();
        $this->qualificacoesFuturas      = new \Doctrine\Common\Collections\ArrayCollection();
        $this->outrosCursos              = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idcurriculo
     *
     * @return integer 
     */
    public function getIdcurriculo()
    {
        return $this->idcurriculo;
    }

    /**
     * Set resumocurriculo
     *
     * @param string $resumocurriculo
     * @return Curriculo
     */
    public function setResumocurriculo($resumocurriculo)
    {
        $this->resumocurriculo = $resumocurriculo;

        return $this;
    }

    /**
     * Get resumocurriculo
     *
     * @return string 
     */
    public function getResumocurriculo()
    {
        return $this->resumocurriculo;
    }

    /**
     * Set prentencaosalarialcurriculo
     *
     * @param float $prentencaosalarialcurriculo
     * @return Curriculo
     */
    public function setPrentencaosalarialcurriculo($prentencaosalarialcurriculo)
    {
        $this->prentencaosalarialcurriculo = $prentencaosalarialcurriculo;

        return $this;
    }

    /**
     * Get prentencaosalarialcurriculo
     *
     * @return float 
     */
    public function getPrentencaosalarialcurriculo()
    {
        return $this->prentencaosalarialcurriculo;
    }

    /**
     * Set atualmenteempregadocurriculo
     *
     * @param boolean $atualmenteempregadocurriculo
     * @return Curriculo
     */
    public function setAtualmenteempregadocurriculo($atualmenteempregadocurriculo)
    {
        $this->atualmenteempregadocurriculo = $atualmenteempregadocurriculo;

        return $this;
    }

    /**
     * Get atualmenteempregadocurriculo
     *
     * @return boolean 
     */
    public function getAtualmenteempregadocurriculo()
    {
        return $this->atualmenteempregadocurriculo;
    }

    /**
     * Set candidatocandidato
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidatocandidato
     * @return Curriculo
     */
    public function setCandidatocandidato(\SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidatocandidato = null)
    {
        $this->candidatocandidato = $candidatocandidato;

        return $this;
    }

    /**
     * Get candidatocandidato
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato 
     */
    public function getCandidatocandidato()
    {
        return $this->candidatocandidato;
    }
    
    /**
     * 
     * @return type
     */
    public function getFormacoes() 
    {
        return $this->formacoes;
    }

    /**
     * 
     * @param type $formacoes
     */
    public function setFormacoes($formacoes) 
    {
        foreach ($formacoes as $formacao) {
            $formacao->setCurriculocurriculo($this);
        }
        
        $this->formacoes = $formacoes;
    }

    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Formacao $formacao
     */
    public function addFormacao(Formacao $formacao)
    {
        $formacao->setCurriculocurriculo($this);
        
        $this->formacoes[] = $formacao;
    }
    
    /**
     * 
     * @return type
     */
    public function getExperienciasProfissionais() 
    {
        return $this->experienciasProfissionais;
    }
    
    /**
     * 
     * @param type $experienciasProfissionais
     */
    public function setExperienciasProfissionais($experienciasProfissionais) 
    {
        foreach ($experienciasProfissionais as $experienciaProfissional) {
            $experienciaProfissional->setCurriculocurriculo($this);
        }
        
        $this->experienciasProfissionais = $experienciasProfissionais;
    }
    
    /**
     * 
     * @param Experienciaprofissional $experienciaprofissional
     */
    public function addExperienciaProfissional(Experienciaprofissional $experienciaprofissional)
    {
        $experienciaprofissional->setCurriculocurriculo($this);
        
        $this->experienciasProfissionais[] = $experienciaprofissional;
    }
    
    /**
     * 
     * @return type
     */
    public function getLinguasExtrangeiras() 
    {
        return $this->linguasExtrangeiras;
    }

    /**
     * 
     * @param type $linguasExtrangeiras
     */
    public function setLinguasExtrangeiras($linguasExtrangeiras) 
    {
        foreach ($linguasExtrangeiras as $linguaExtrangeira) {
            $linguaExtrangeira->setCurriculocurriculo($this);
        }
        
        $this->linguasExtrangeiras = $linguasExtrangeiras;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Linguaextrangeira $linguaExtrangeira
     */
    public function addLinguaExtrangeira(Linguaextrangeira $linguaExtrangeira)
    {
        $linguaExtrangeira->setCurriculocurriculo($this);
        
        $this->linguasExtrangeiras[] = $linguaExtrangeira;
    }
    
    /**
     * 
     * @return type
     */
    public function getInformatica()
    {
        return $this->informatica;
    }

    /**
     * 
     * @param type $informatica
     */
    public function setInformatica($informatica) 
    {
        foreach ($informatica as $info) {
            $info->setCurriculocurriculo($this);
        }
        
        $this->informatica = $informatica;
    }
    
    /**
     * 
     * @return type
     */
    public function getOutrosCursos()
    {
        return $this->outrosCursos;
    }
    
    /**
     * 
     * @param type $outrosCursos
     */
    public function setOutrosCursos($outrosCursos) 
    {
        foreach ($outrosCursos as $curso) {
            $curso->setCurriculocurriculo($this);
        }
        
        $this->outrosCursos = $outrosCursos;
    }

    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Informatica $informatica
     */
    public function addInformatica(Informatica $informatica)
    {
        $informatica->setCurriculocurriculo($this);
        
        $this->informatica[] = $informatica;
    }
    
    /**
     * 
     * @return type
     */
    public function getQualificacoesFuturas() 
    {
        return $this->qualificacoesFuturas;
    }
    
    /**
     * 
     * @param type $qualificacoesFuturas
     */
    public function setQualificacoesFuturas($qualificacoesFuturas) 
    {
        foreach ($qualificacoesFuturas as $qualificacaoFutura) {
            $qualificacaoFutura->setCurriculocurriculo($this);
        }
        
        $this->qualificacoesFuturas = $qualificacoesFuturas;
    }

    /**
     * 
     * @return type
     */
    public function getInformacaoBusca() 
    {
        return $this->informacaoBusca;
    }

    /**
     * 
     * @param Informacoesbusca $informacaoBusca
     */
    public function setInformacaoBusca(Informacoesbusca $informacaoBusca) 
    {
        $informacaoBusca->setCurriculocurriculo($this);
        $this->informacaoBusca = $informacaoBusca;
    }    
    
    
}