<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Identificacaonecessidade
 *
 * @ORM\Table(name="identificacaoNecessidade", indexes={@ORM\Index(name="fk_identificacaoNecessidade_credito1_idx", columns={"credito_idCredito"}), @ORM\Index(name="fk_identificacaoNecessidade_capacitacao1_idx", columns={"capacitacao_idCapacitacao"}), @ORM\Index(name="fk_identificacaoNecessidade_tipoQualificacao1_idx", columns={"tipoQualificacao_idTipoQualificacao"}), @ORM\Index(name="fk_identificacaoNecessidade_formalizacao1_idx", columns={"formalizacao_idFormalizacao"}), @ORM\Index(name="fk_identificacaoNecessidade_empreendedor1_idx", columns={"empreendedor_idEmpreendedor"})})
 * @ORM\Entity
 */
class Identificacaonecessidade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idIdentificacaoNecessidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ididentificacaonecessidade;

    /**
     * @var string
     *
     * @ORM\Column(name="consultoria", type="string", length=45, nullable=true)
     */
    private $consultoria;

    /**
     * @var string
     *
     * @ORM\Column(name="historico", type="text", nullable=true)
     */
    private $historico;

    /**
     * @var \Capacitacao
     *
     * @ORM\ManyToOne(targetEntity="Capacitacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="capacitacao_idCapacitacao", referencedColumnName="idCapacitacao")
     * })
     */
    private $capacitacaocapacitacao;

    /**
     * @var \Credito
     *
     * @ORM\ManyToOne(targetEntity="Credito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credito_idCredito", referencedColumnName="idCredito")
     * })
     */
    private $creditocredito;

    /**
     * @var \Empreendedor
     *
     * @ORM\OneToOne(targetEntity="Empreendedor", inversedBy="indentificacaoNecessidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empreendedor_idEmpreendedor", referencedColumnName="idEmpreendedor")
     * })
     */
    private $empreendedorempreendedor;

    /**
     * @var \Formalizacao
     *
     * @ORM\ManyToOne(targetEntity="Formalizacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formalizacao_idFormalizacao", referencedColumnName="idFormalizacao")
     * })
     */
    private $formalizacaoformalizacao;

    /**
     * @var \Tipoqualificacao
     *
     * @ORM\ManyToOne(targetEntity="Tipoqualificacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoQualificacao_idTipoQualificacao", referencedColumnName="idTipoQualificacao")
     * })
     */
    private $tipoqualificacaotipoqualificacao;



    /**
     * Get ididentificacaonecessidade
     *
     * @return integer 
     */
    public function getIdidentificacaonecessidade()
    {
        return $this->ididentificacaonecessidade;
    }

    /**
     * Set consultoria
     *
     * @param string $consultoria
     * @return Identificacaonecessidade
     */
    public function setConsultoria($consultoria)
    {
        $this->consultoria = $consultoria;

        return $this;
    }

    /**
     * Get consultoria
     *
     * @return string 
     */
    public function getConsultoria()
    {
        return $this->consultoria;
    }

    /**
     * Set historico
     *
     * @param string $historico
     * @return Identificacaonecessidade
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string 
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * Set capacitacaocapacitacao
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacao $capacitacaocapacitacao
     * @return Identificacaonecessidade
     */
    public function setCapacitacaocapacitacao(\SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacao $capacitacaocapacitacao = null)
    {
        $this->capacitacaocapacitacao = $capacitacaocapacitacao;

        return $this;
    }

    /**
     * Get capacitacaocapacitacao
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacao 
     */
    public function getCapacitacaocapacitacao()
    {
        return $this->capacitacaocapacitacao;
    }

    /**
     * Set creditocredito
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Credito $creditocredito
     * @return Identificacaonecessidade
     */
    public function setCreditocredito(\SerBinario\SAD\Bundle\SADBundle\Entity\Credito $creditocredito = null)
    {
        $this->creditocredito = $creditocredito;

        return $this;
    }

    /**
     * Get creditocredito
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Credito 
     */
    public function getCreditocredito()
    {
        return $this->creditocredito;
    }

    /**
     * Set empreendedorempreendedor
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor $empreendedorempreendedor
     * @return Identificacaonecessidade
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
     * Set formalizacaoformalizacao
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Formalizacao $formalizacaoformalizacao
     * @return Identificacaonecessidade
     */
    public function setFormalizacaoformalizacao(\SerBinario\SAD\Bundle\SADBundle\Entity\Formalizacao $formalizacaoformalizacao = null)
    {
        $this->formalizacaoformalizacao = $formalizacaoformalizacao;

        return $this;
    }

    /**
     * Get formalizacaoformalizacao
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Formalizacao 
     */
    public function getFormalizacaoformalizacao()
    {
        return $this->formalizacaoformalizacao;
    }

    /**
     * Set tipoqualificacaotipoqualificacao
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacao $tipoqualificacaotipoqualificacao
     * @return Identificacaonecessidade
     */
    public function setTipoqualificacaotipoqualificacao(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacao $tipoqualificacaotipoqualificacao = null)
    {
        $this->tipoqualificacaotipoqualificacao = $tipoqualificacaotipoqualificacao;

        return $this;
    }

    /**
     * Get tipoqualificacaotipoqualificacao
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacao 
     */
    public function getTipoqualificacaotipoqualificacao()
    {
        return $this->tipoqualificacaotipoqualificacao;
    }
}
