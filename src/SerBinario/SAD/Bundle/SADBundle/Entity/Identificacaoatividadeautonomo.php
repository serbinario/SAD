<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Identificacaoatividadeautonomo
 *
 * @ORM\Table(name="identificacaoAtividadeAutonomo", indexes={@ORM\Index(name="fk_identificacaoAtividadeAutonomo_autonomo1_idx", columns={"autonomo_idAutonomo"}), @ORM\Index(name="fk_identificacaoAtividadeAutonomo_tipoAtividadeAutonomo1_idx", columns={"tipoAtividadeAutonomo_idTipoAtividadeAutonomo"}), @ORM\Index(name="fk_identificacaoAtividadeAutonomo_areaAbrangenciaAutonomo1_idx", columns={"areaAbrangenciaAutonomo_idAreaAbrangenciaAutonomo"}), @ORM\Index(name="fk_identificacaoAtividadeAutonomo_qtdPessoasEnvolvidasAuton_idx", columns={"qtdPessoasEnvolvidasAutonomo_idQtdPessoasEnvolvidasAutonomo"})})
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
     * @var string
     *
     * @ORM\Column(name="observacoesIdentificacaoAtividadeAutonomo", type="text", nullable=true)
     */
    private $observacoesidentificacaoatividadeautonomo;

    /**
     * @var \Autonomo
     *
     * @ORM\ManyToOne(targetEntity="Autonomo")
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
     * @var \Qtdpessoasenvolvidasautonomo
     *
     * @ORM\ManyToOne(targetEntity="Qtdpessoasenvolvidasautonomo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="qtdPessoasEnvolvidasAutonomo_idQtdPessoasEnvolvidasAutonomo", referencedColumnName="idQtdPessoasEnvolvidasAutonomo")
     * })
     */
    private $qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo;



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
     * Set qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Qtdpessoasenvolvidasautonomo $qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo
     * @return Identificacaoatividadeautonomo
     */
    public function setQtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo(\SerBinario\SAD\Bundle\SADBundle\Entity\Qtdpessoasenvolvidasautonomo $qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo = null)
    {
        $this->qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo = $qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo;

        return $this;
    }

    /**
     * Get qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Qtdpessoasenvolvidasautonomo 
     */
    public function getQtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo()
    {
        return $this->qtdpessoasenvolvidasautonomoqtdpessoasenvolvidasautonomo;
    }
}
