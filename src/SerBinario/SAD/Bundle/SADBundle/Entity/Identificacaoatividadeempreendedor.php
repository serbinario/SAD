<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Identificacaoatividadeempreendedor
 *
 * @ORM\Table(name="identificacaoAtividadeEmpreendedor")
 * @ORM\Entity
 */
class Identificacaoatividadeempreendedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idIdentificacaoAtividadeEmpreendedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ididentificacaoatividadeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="equipamentoUltilizadoEmpreendedor", type="string", length=45, nullable=true)
     */
    private $equipamentoultilizadoempreendedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="tempoAtividadeEmpreendedor", type="integer", nullable=true)
     */
    private $tempoatividadeempreendedor;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoesEmpreendedor", type="text", nullable=true)
     */
    private $observacoesempreendedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="qtdPessoasEnvolvidas", type="integer", nullable=false)
     */
    private $qtdPessoasEnvolvidas;

    /**
     * @var \Ramonegocioempreendedor
     *
     * @ORM\ManyToOne(targetEntity="Ramonegocioempreendedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ramoNegocioEmpreendedor_idRamoNegocioEmpreendedor", referencedColumnName="idRamoNegocioEmpreendedor")
     * })
     */
    private $ramonegocioempreendedorramonegocioempreendedor;

    /**
     * @var \Tipoatividadeempreendedor
     *
     * @ORM\ManyToOne(targetEntity="Tipoatividadeempreendedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoAtividadeEmpreendedor_idTipoAtividadeEmpreendedor", referencedColumnName="idTipoAtividadeEmpreendedor")
     * })
     */
    private $tipoatividadeempreendedortipoatividadeempreendedor;

    /**
     * @var \Empreendedor
     *
     * @ORM\ManyToOne(targetEntity="Empreendedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empreendedor_idEmpreendedor", referencedColumnName="idEmpreendedor")
     * })
     */
    private $empreendedorempreendedor;



    /**
     * Get ididentificacaoatividadeempreendedor
     *
     * @return integer 
     */
    public function getIdidentificacaoatividadeempreendedor()
    {
        return $this->ididentificacaoatividadeempreendedor;
    }

    /**
     * Set equipamentoultilizadoempreendedor
     *
     * @param string $equipamentoultilizadoempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setEquipamentoultilizadoempreendedor($equipamentoultilizadoempreendedor)
    {
        $this->equipamentoultilizadoempreendedor = $equipamentoultilizadoempreendedor;

        return $this;
    }

    /**
     * Get equipamentoultilizadoempreendedor
     *
     * @return string 
     */
    public function getEquipamentoultilizadoempreendedor()
    {
        return $this->equipamentoultilizadoempreendedor;
    }

    /**
     * Set tempoatividadeempreendedor
     *
     * @param integer $tempoatividadeempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setTempoatividadeempreendedor($tempoatividadeempreendedor)
    {
        $this->tempoatividadeempreendedor = $tempoatividadeempreendedor;

        return $this;
    }

    /**
     * Get tempoatividadeempreendedor
     *
     * @return integer 
     */
    public function getTempoatividadeempreendedor()
    {
        return $this->tempoatividadeempreendedor;
    }

    /**
     * Set observacoesempreendedor
     *
     * @param string $observacoesempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setObservacoesempreendedor($observacoesempreendedor)
    {
        $this->observacoesempreendedor = $observacoesempreendedor;

        return $this;
    }

    /**
     * Get observacoesempreendedor
     *
     * @return string 
     */
    public function getObservacoesempreendedor()
    {
        return $this->observacoesempreendedor;
    }

    /**
     * Set ramonegocioempreendedorramonegocioempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Ramonegocioempreendedor $ramonegocioempreendedorramonegocioempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setRamonegocioempreendedorramonegocioempreendedor(\SerBinario\SAD\Bundle\SADBundle\Entity\Ramonegocioempreendedor $ramonegocioempreendedorramonegocioempreendedor = null)
    {
        $this->ramonegocioempreendedorramonegocioempreendedor = $ramonegocioempreendedorramonegocioempreendedor;

        return $this;
    }

    /**
     * Get ramonegocioempreendedorramonegocioempreendedor
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Ramonegocioempreendedor 
     */
    public function getRamonegocioempreendedorramonegocioempreendedor()
    {
        return $this->ramonegocioempreendedorramonegocioempreendedor;
    }

    /**
     * Set tipoatividadeempreendedortipoatividadeempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeempreendedor $tipoatividadeempreendedortipoatividadeempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setTipoatividadeempreendedortipoatividadeempreendedor(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeempreendedor $tipoatividadeempreendedortipoatividadeempreendedor = null)
    {
        $this->tipoatividadeempreendedortipoatividadeempreendedor = $tipoatividadeempreendedortipoatividadeempreendedor;

        return $this;
    }

    /**
     * Get tipoatividadeempreendedortipoatividadeempreendedor
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeempreendedor 
     */
    public function getTipoatividadeempreendedortipoatividadeempreendedor()
    {
        return $this->tipoatividadeempreendedortipoatividadeempreendedor;
    }

    /**
     * Set empreendedorempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor
     * @return Identificacaoatividadeempreendedor
     */
    public function setEmpreendedorempreendedor(\SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor = null)
    {
        $this->empreendedorempreendedor = $empreendedorempreendedor;

        return $this;
    }

    /**
     * Get empreendedorempreendedor
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor 
     */
    public function getEmpreendedorempreendedor()
    {
        return $this->empreendedorempreendedor;
    }
    
    /**
     * 
     * @return type
     */
    public function getQtdPessoasEnvolvidas() 
    {
        return $this->qtdPessoasEnvolvidas;
    }

    /**
     * 
     * @param type $qtdPessoasEnvolvidas
     */
    public function setQtdPessoasEnvolvidas($qtdPessoasEnvolvidas) 
    {
        $this->qtdPessoasEnvolvidas = $qtdPessoasEnvolvidas;
    }
    
}