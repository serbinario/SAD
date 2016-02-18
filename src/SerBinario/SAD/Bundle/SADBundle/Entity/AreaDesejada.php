<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * areaDesejada
 *
 * @ORM\Table(name="areaDesejada")
 * @ORM\Entity
 */
class AreaDesejada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAreaDesejada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAreaDesejada;

    /**
     * @var string
     *
     * @ORM\Column(name="areaDesejada", type="string", length=100, nullable=true)
     */
    private $areaDesejada;
    
    /**
     * @var \Opcoesareadesejada
     *
     * @ORM\OneToMany(targetEntity="Opcoesareadesejada", mappedBy="areaDesejada", cascade={"all"})
     */
    private $opcaoDesejada;
    
    /**
     * @var \VagasDisponiveis
     *
     * @ORM\OneToMany(targetEntity="VagasDisponiveis", mappedBy="areaDesejada", cascade={"all"})
     */
    private $vagasDisponiveis;
    
    /**
     * @var \Vagas
     *
     * @ORM\OneToMany(targetEntity="Vagas", mappedBy="areaDesejada", cascade={"all"})
     */
    private $vagas;
    
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
    function getIdAreaDesejada() {
        return $this->idAreaDesejada;
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
     * @return type
     */
    function getOpcaoDesejada() {
        return $this->opcaoDesejada;
    }
    
    /**
     * 
     * @param type $idAreaDesejada
     */
    function setIdAreaDesejada($idAreaDesejada) {
        $this->idAreaDesejada = $idAreaDesejada;
    }
    
    /**
     * 
     * @param type $areaDesejada
     */
    function setAreaDesejada($areaDesejada) {
        $this->areaDesejada = $areaDesejada;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Opcoesareadesejada $opcaoDesejadas
     */
    function setOpcaoDesejada(Opcoesareadesejada $opcaoDesejadas) {
        
        if(count($opcaoDesejadas) > 0) {
            foreach ($opcaoDesejadas as $opcao) {
                $opcao->setVagas($this);
            }
        }
        
        $this->opcaoDesejada = $opcaoDesejadas;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString()
    {
        return $this->areaDesejada;
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
    function getVagas() {
        return $this->vagas;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Vagas $vagas
     */
    function setVagas(Vagas $vagas) {
        
        $this->vagas = $vagas;
        
    }
}
