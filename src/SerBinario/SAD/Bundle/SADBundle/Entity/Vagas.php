<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \VagasDisponiveis
     *
     * @ORM\OneToMany(targetEntity="VagasDisponiveis", mappedBy="vagas", cascade={"all"})
     */
    private $vagasDisponiveis;
    
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
    
    public function __toString()
    {
        return $this->nomeVaga;
    }

}
