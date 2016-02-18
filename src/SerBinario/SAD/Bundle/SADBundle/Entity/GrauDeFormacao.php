<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrauDeFormacao
 *
 * @ORM\Table(name="graudeformacao")
 * @ORM\Entity
 */
class GrauDeFormacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_grau_formacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGrauFormacao;

    /**
     * @var string
     *
     * @ORM\Column(name="grau_formacao", type="string", length=100, nullable=true)
     */
    private $grauFormacao;

    
    /**
     * 
     * @return type
     */
    function getIdGrauFormacao() {
        return $this->idGrauFormacao;
    }
    
    /**
     * 
     * @return type
     */
    function getGrauFormacao() {
        return $this->grauFormacao;
    }
    
    /**
     * 
     * @param type $idGrauFormacao
     */
    function setIdGrauFormacao($idGrauFormacao) {
        $this->idGrauFormacao = $idGrauFormacao;
    }
    
    /**
     * 
     * @param type $grauFormacao
     */
    function setGrauFormacao($grauFormacao) {
        $this->grauFormacao = $grauFormacao;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getGrauFormacao();
    }
}
