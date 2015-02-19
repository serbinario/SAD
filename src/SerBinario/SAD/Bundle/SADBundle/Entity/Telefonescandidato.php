<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefonescandidato
 *
 * @ORM\Table(name="telefonesCandidato", indexes={@ORM\Index(name="fk_telefonesCandidato_candidato1_idx", columns={"candidato_idCandidato"})})
 * @ORM\Entity
 */
class Telefonescandidato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTelefonesCandidato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtelefonescandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=10, nullable=true)
     */
    private $telefone;

    /**
     * @var \Candidato
     *
     * @ORM\ManyToOne(targetEntity="Candidato", inversedBy="telefones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidato_idCandidato", referencedColumnName="idCandidato")
     * })
     */
    private $candidatocandidato;



    /**
     * Get idtelefonescandidato
     *
     * @return integer 
     */
    public function getIdtelefonescandidato()
    {
        return $this->idtelefonescandidato;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return Telefonescandidato
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set candidatocandidato
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidatocandidato
     * @return Telefonescandidato
     */
    public function setCandidatocandidato(\SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidatocandidato = null)
    {
        $this->candidatocandidato = $candidatocandidato;

        return $this;
    }

    /**
     * Get candidatocandidato
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato 
     */
    public function getCandidatocandidato()
    {
        return $this->candidatocandidato;
    }
}
