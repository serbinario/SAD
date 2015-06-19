<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Vagas
 *
 * @ORM\Table(name="vagas")
 * @ORM\Entity
 */
class Vagas 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vagas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVagas;
    
    /**
     * @var String
     *
     * @ORM\Column(name="nome_vaga", type="string", nullable=false)
     */
    private $nomeVaga;
    
    /**
     * @var \Opcoesareadesejada
     *
     * @ORM\OneToMany(targetEntity="Opcoesareadesejada", mappedBy="vagas", cascade={"all"})
     */
    private $opcaoDesejada;
    
    /**
     *
     * @var \AreaDesejada 
     * 
     * @ORM\ManyToOne(targetEntity="AreaDesejada", inversedBy="vagas")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idAreaDesejada", referencedColumnName="idAreaDesejada")
     * })
     */
    private $areaDesejada;
    
    /**
     * @var \VagasDisponiveis
     *
     * @ORM\OneToMany(targetEntity="VagasDisponiveis", mappedBy="vagas", cascade={"all"})
     */
    private $vagasDisponiveis;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->opcaoDesejada = new ArrayCollection();
    }
    
    /**
     * 
     * @return type
     */
    function getIdVagas() {
        return $this->idVagas;
    }
    
    /**
     * 
     * @return type
     */
    function getNomeVaga() {
        return $this->nomeVaga;
    }
    
    /**
     * 
     * @param type $idVagas
     */
    function setIdVagas($idVagas) {
        $this->idVagas = $idVagas;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\String $nomeVaga
     */
    function setNomeVaga($nomeVaga) {
        $this->nomeVaga = $nomeVaga;
    }
    
    /**
     * 
     * @return type
     */
    function getVagasDisponiveis() {
        return $this->vagasDisponiveis;
    }
    
    /**
     * 
     * @param \VagasDisponiveis $vagasDisponiveis
     */
    function setVagasDisponiveis(VagasDisponiveis $vagasDisponiveis) {
        $this->vagasDisponiveis = $vagasDisponiveis;
    }
    
    /**
     * 
     * @return type
     */
    function getOpcaoDesejada() {
        return $this->opcaoDesejada;
    }
    
    /**
     * 
     * @param \Opcoesareadesejada $opcaoDesejadas
     */
    function setOpcaoDesejada($opcaoDesejadas) {
        
        if(count($opcaoDesejadas) > 0) {
            foreach ($opcaoDesejadas as $opcao) {
                $opcao->setAreaDesejada($this);
            }
        }
              
        $this->opcaoDesejada = $opcaoDesejada;
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
     * @param \AreaDesejada $areaDesejada
     */
    function setAreaDesejada(AreaDesejada $areaDesejada) {
        $this->areaDesejada = $areaDesejada;
    }
    
    public function __toString()
    {
        return $this->nomeVaga;
    }

}
