<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cnh
 *
 * @ORM\Table(name="cnh", indexes={@ORM\Index(name="fk_cnh_candidato1_idx", columns={"candidato_idCandidato"})})
 * @ORM\Entity
 */
class Cnh
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCnh", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcnh;

    /**
     * @var integer
     *
     * @ORM\Column(name="validadeCnh", type="integer", nullable=true)
     */
    private $validadecnh;

    /**
     * @var string
     *
     * @ORM\Column(name="categoriaCnh", type="string", length=45, nullable=true)
     */
    private $categoriacnh;

    /**
     * @var \Candidato
     *
     * @ORM\ManyToOne(targetEntity="Candidato", inversedBy="objCnh")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidato_idCandidato", referencedColumnName="idCandidato")
     * })
     */
    private $candidatocandidato;



    /**
     * Get idcnh
     *
     * @return integer 
     */
    public function getIdcnh()
    {
        return $this->idcnh;
    }

    /**
     * Set validadecnh
     *
     * @param integer $validadecnh
     * @return Cnh
     */
    public function setValidadecnh($validadecnh)
    {
        $this->validadecnh = $validadecnh;

        return $this;
    }

    /**
     * Get validadecnh
     *
     * @return integer 
     */
    public function getValidadecnh()
    {
        return $this->validadecnh;
    }

    /**
     * Set categoriacnh
     *
     * @param string $categoriacnh
     * @return Cnh
     */
    public function setCategoriacnh($categoriacnh)
    {
        $this->categoriacnh = $categoriacnh;

        return $this;
    }

    /**
     * Get categoriacnh
     *
     * @return string 
     */
    public function getCategoriacnh()
    {
        return $this->categoriacnh;
    }

    /**
     * Set candidatocandidato
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Candidato $candidatocandidato
     * @return Cnh
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
