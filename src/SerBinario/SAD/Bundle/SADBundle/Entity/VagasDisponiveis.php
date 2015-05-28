<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vagas
 *
 * @ORM\Table(name="vagasDiponiveis")
 * @ORM\Entity
 */
class VagasDisponiveis 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vagasDisponiveis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVagasDiponiveis;
    
    /**
     * @var Integer
     *
     * @ORM\Column(name="qtd_vaga", type="integer", nullable=false)
     */
    private $qtdVagas;
    
    /**
     *
     * @var \Vagas 
     * 
     * @ORM\ManyToOne(targetEntity="Vagas", inversedBy="vagasDisponiveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Vagas", referencedColumnName="id_vagas")
     * })
     */
    private $vagas;
    
    /**
     *
     * @var \Empresa 
     * 
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="vagasDisponiveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empresas", referencedColumnName="id_empresa")
     * })
     */
    private $empresas;
    
    /**
     *
     * @var \AreaDesejada 
     * 
     * @ORM\ManyToOne(targetEntity="AreaDesejada", inversedBy="vagasDisponiveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_AreaDesejada", referencedColumnName="idAreaDesejada")
     * })
     */
    private $areaDesejada;
    
    /**
     * 
     * @return type
     */
    function getIdVagasDiponiveis() {
        return $this->idVagasDiponiveis;
    }
    
    /**
     * 
     * @return type
     */
    function getQtdVagas() {
        return $this->qtdVagas;
    }
    
    /**
     * 
     * @return type
     */
    function getVagas() {
        return $this->vagas;
    }
    
    /**
     * 
     * @return type
     */
    function getEmpresas() {
        return $this->empresas;
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
     * @param type $idVagasDiponiveis
     */
    function setIdVagasDiponiveis($idVagasDiponiveis) {
        $this->idVagasDiponiveis = $idVagasDiponiveis;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Integer $qtdVagas
     */
    function setQtdVagas($qtdVagas) {
        $this->qtdVagas = $qtdVagas;
    }
    
    /**
     * 
     * @param \Vagas $vagas
     */
    function setVagas(Vagas $vagas) {
        $this->vagas = $vagas;
    }
    
    /**
     * 
     * @param \Empresa $empresas
     */
    function setEmpresas(Empresa $empresas) {
        $this->empresas = $empresas;
    }
    
    /**
     * 
     * @param \AreaDesejada $areaDesejada
     */
    function setAreaDesejada(AreaDesejada $areaDesejada) {
        $this->areaDesejada = $areaDesejada;
    }

}
