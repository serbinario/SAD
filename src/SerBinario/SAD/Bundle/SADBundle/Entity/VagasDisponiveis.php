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
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="date", nullable=true)
     */
    private $dataCadastro;
    
    /**
     * @var string
     *
     * @ORM\Column(name="perfil", type="text", nullable=true)
     */
    private $perfil;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status = false;
    
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
     * @var VagasDisponiveisCandidato 
     * 
     * @ORM\OneToMany(targetEntity="VagasDisponiveisCandidato", mappedBy="vagasDisponiveis", cascade={"persist"})
     */
    private $vagaDisponivelCand;
    
    
    public function __construct() 
    {
        $this->candidato      = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
    
    /**
     * 
     * @return type
     */
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    
    /**
     * 
     * @return type
     */
    function getPerfil() {
        return $this->perfil;
    }
    
    /**
     * 
     * @param \DateTime $dataCadastro
     */
    function setDataCadastro(\DateTime $dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
    
    /**
     * 
     * @param type $perfil
     */
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
    
    /**
     * 
     * @return type
     */
    function getCandidato() {
        return $this->candidato;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidato
     */
    function setCandidato(Candidato $candidato = null) {
        
        $this->candidato[] = $candidato;
        
    }
    
    /**
     * 
     * @return type
     */
    function getVagaDisponivelCand() {
        return $this->vagaDisponivelCand;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\type $vagaDisponivelCand
     */
    function setVagaDisponivelCand($vagaDisponivelCand) {
        $this->vagaDisponivelCand = $vagaDisponivelCand;
    }
    
    /**
     * 
     * @return type
     */
    function getStatus() {
        return $this->status;
    }
    
    /**
     * 
     * @param type $status
     */
    function setStatus($status) {
        $this->status = $status;
    }
}
