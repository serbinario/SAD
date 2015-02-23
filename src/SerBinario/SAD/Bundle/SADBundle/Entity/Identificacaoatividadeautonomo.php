<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Identificacaoatividadeautonomo
 *
 * @ORM\Table(name="identificacaoAtividadeAutonomo")
 * @ORM\Entity
 */
class Identificacaoatividadeautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idIdentificacaoAtividadeAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ididentificacaoatividadeautonomo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tempoAtividadeAutonomo", type="integer", nullable=true)
     */
    private $tempoatividadeautonomo;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="qtdpessoasenvolvidasautonomo", type="integer", nullable=true)
     */
    private $qtdPessoasEnvolvidasAutonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoesIdentificacaoAtividadeAutonomo", type="text", nullable=true)
     */
    private $observacoesidentificacaoatividadeautonomo;

    /**
     * @var \Autonomo
     *
     * @ORM\OneToOne(targetEntity="Autonomo", inversedBy="identificacaoAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="autonomo_idAutonomo", referencedColumnName="idAutonomo")
     * })
     */
    private $autonomoautonomo;

    /**
     * @var \Tipoatividadeautonomo
     *
     * @ORM\ManyToOne(targetEntity="Tipoatividadeautonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoAtividadeAutonomo_idTipoAtividadeAutonomo", referencedColumnName="idTipoAtividadeAutonomo")
     * })
     */
    private $tipoatividadeautonomotipoatividadeautonomo;

    /**
     * @var \Areaabrangenciaautonomo
     *
     * @ORM\ManyToOne(targetEntity="Areaabrangenciaautonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areaAbrangenciaAutonomo_idAreaAbrangenciaAutonomo", referencedColumnName="idAreaAbrangenciaAutonomo")
     * })
     */
    private $areaabrangenciaautonomoareaabrangenciaautonomo;
    
    /**
     * @var \Ramoatividadeautonomo
     *
     * @ORM\ManyToOne(targetEntity="Ramoatividadeautonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ramoAtividade", referencedColumnName="idRamoAtividadeAutonomo")
     * })
     */
    private $ramoAtividade;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Referenciaprofissionalautonomo", mappedBy="identificacaoatividadeautonomoidentificacaoatividadeautonomo", cascade={"all"})
     */
    private $referenciasProfissionais;


    /**
     * Get ididentificacaoatividadeautonomo
     *
     * @return integer 
     */
    public function getIdidentificacaoatividadeautonomo()
    {
        return $this->ididentificacaoatividadeautonomo;
    }

    /**
     * Set tempoatividadeautonomo
     *
     * @param integer $tempoatividadeautonomo
     * @return Identificacaoatividadeautonomo
     */
    public function setTempoatividadeautonomo($tempoatividadeautonomo)
    {
        $this->tempoatividadeautonomo = $tempoatividadeautonomo;

        return $this;
    }

    /**
     * Get tempoatividadeautonomo
     *
     * @return integer 
     */
    public function getTempoatividadeautonomo()
    {
        return $this->tempoatividadeautonomo;
    }

    /**
     * Set observacoesidentificacaoatividadeautonomo
     *
     * @param string $observacoesidentificacaoatividadeautonomo
     * @return Identificacaoatividadeautonomo
     */
    public function setObservacoesidentificacaoatividadeautonomo($observacoesidentificacaoatividadeautonomo)
    {
        $this->observacoesidentificacaoatividadeautonomo = $observacoesidentificacaoatividadeautonomo;

        return $this;
    }

    /**
     * Get observacoesidentificacaoatividadeautonomo
     *
     * @return string 
     */
    public function getObservacoesidentificacaoatividadeautonomo()
    {
        return $this->observacoesidentificacaoatividadeautonomo;
    }

    /**
     * Set autonomoautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo $autonomoautonomo
     * @return Identificacaoatividadeautonomo
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

    /**
     * Set tipoatividadeautonomotipoatividadeautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeautonomo $tipoatividadeautonomotipoatividadeautonomo
     * @return Identificacaoatividadeautonomo
     */
    public function setTipoatividadeautonomotipoatividadeautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeautonomo $tipoatividadeautonomotipoatividadeautonomo = null)
    {
        $this->tipoatividadeautonomotipoatividadeautonomo = $tipoatividadeautonomotipoatividadeautonomo;

        return $this;
    }

    /**
     * Get tipoatividadeautonomotipoatividadeautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeautonomo 
     */
    public function getTipoatividadeautonomotipoatividadeautonomo()
    {
        return $this->tipoatividadeautonomotipoatividadeautonomo;
    }

    /**
     * Set areaabrangenciaautonomoareaabrangenciaautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Areaabrangenciaautonomo $areaabrangenciaautonomoareaabrangenciaautonomo
     * @return Identificacaoatividadeautonomo
     */
    public function setAreaabrangenciaautonomoareaabrangenciaautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Areaabrangenciaautonomo $areaabrangenciaautonomoareaabrangenciaautonomo = null)
    {
        $this->areaabrangenciaautonomoareaabrangenciaautonomo = $areaabrangenciaautonomoareaabrangenciaautonomo;

        return $this;
    }

    /**
     * Get areaabrangenciaautonomoareaabrangenciaautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Areaabrangenciaautonomo 
     */
    public function getAreaabrangenciaautonomoareaabrangenciaautonomo()
    {
        return $this->areaabrangenciaautonomoareaabrangenciaautonomo;
    }
    
    /**
     * 
     * @return type
     */
    public function getQtdPessoasEnvolvidasAutonomo()
    {
        return $this->qtdPessoasEnvolvidasAutonomo;
    }

    /**
     * 
     * @param type $qtdPessoasEnvolvidasAutonomo
     */
    public function setQtdPessoasEnvolvidasAutonomo($qtdPessoasEnvolvidasAutonomo) 
    {
        $this->qtdPessoasEnvolvidasAutonomo = $qtdPessoasEnvolvidasAutonomo;
    }
    
    /**
     * 
     * @return type
     */
    public function getRamoAtividade() 
    {
        return $this->ramoAtividade;
    }

    /**
     * 
     * @param type $ramoAtividade
     */
    public function setRamoAtividade($ramoAtividade) 
    {
        $this->ramoAtividade = $ramoAtividade;
    }

    /**
     * 
     * @return type
     */
    public function getReferenciasProfissionais()
    {
        return $this->referenciasProfissionais;
    }

    /**
     * 
     * @param type $referenciasProfissionais
     */
    public function setReferenciasProfissionais($referenciasProfissionais)
    {
        foreach ($referenciasProfissionais as $referenciaProfissional) {
            $referenciaProfissional->setIdentificacaoatividadeautonomoidentificacaoatividadeautonomo($this);
        }
        
        $this->referenciasProfissionais = $referenciasProfissionais;
    }




}
