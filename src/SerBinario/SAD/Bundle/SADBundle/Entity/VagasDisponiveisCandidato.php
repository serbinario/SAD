<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VagasDisponiveisCandidato
 *
 * @ORM\Table(name="VagasDisponiveisCandidato")
 * @ORM\Entity
 */
class VagasDisponiveisCandidato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vagas_disponiveis_candidato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVagasDisponiveisCandidato;
    
    /**
     *
     * @var \Candidato 
     * 
     * @ORM\ManyToOne(targetEntity="Candidato", inversedBy="vagaDisponivel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCandidato", referencedColumnName="idCandidato")
     * })
     */
    private $candidato;
    
    /**
     *
     * @var \VagasDisponiveis 
     * 
     * @ORM\ManyToOne(targetEntity="VagasDisponiveis", inversedBy="vagaDisponivelCand")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_vagasDisponiveis", referencedColumnName="id_vagasDisponiveis")
     * })
     */
    private $vagasDisponiveis;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="encaminhado", type="boolean", nullable=true)
     */
    private $encaminhado;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="negado", type="boolean", nullable=true)
     */
    private $negado = false;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="aprovado", type="boolean", nullable=true)
     */
    private $aprovado = false;
    
    /**
     * 
     * @return type
     */
    function getIdVagasDisponiveisCandidato() {
        return $this->idVagasDisponiveisCandidato;
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
     * @return type
     */
    function getVagasDisponiveis() {
        return $this->vagasDisponiveis;
    }
    
    /**
     * 
     * @return type
     */
    function getEncaminhado() {
        return $this->encaminhado;
    }
    
    /**
     * 
     * @return type
     */
    function getNegado() {
        return $this->negado;
    }
    
    /**
     * 
     * @return type
     */
    function getAprovado() {
        return $this->aprovado;
    }
    
    /**
     * 
     * @param type $idVagasDisponiveisCandidato
     */
    function setIdVagasDisponiveisCandidato($idVagasDisponiveisCandidato) {
        $this->idVagasDisponiveisCandidato = $idVagasDisponiveisCandidato;
    }
    
    /**
     * 
     * @param \Candidato $candidato
     */
    function setCandidato($candidato) {
        $this->candidato = $candidato;
    }
    
    /**
     * 
     * @param \VagasDisponiveis $vagasDisponiveis
     */
    function setVagasDisponiveis($vagasDisponiveis) {
        $this->vagasDisponiveis = $vagasDisponiveis;
    }
    
    /**
     * 
     * @param type $encaminhado
     */
    function setEncaminhado($encaminhado) {
        $this->encaminhado = $encaminhado;
    }
    
    /**
     * 
     * @param type $negado
     */
    function setNegado($negado) {
        $this->negado = $negado;
    }
    
    /**
     * 
     * @param type $aprovado
     */
    function setAprovado($aprovado) {
        $this->aprovado = $aprovado;
    }

}
