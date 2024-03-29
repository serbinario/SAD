<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcao
 *
 * @ORM\Table(name="funcao")
 * @ORM\Entity
 */
class Funcao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFuncao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncao;

    /**
     * @var string
     *
     * @ORM\Column(name="funcao", type="string", length=100, nullable=true)
     */
    private $funcao;   
    
    /**
     * 
     * @return type
     */
    function getIdFuncao() {
        return $this->idFuncao;
    }
    
    /**
     * 
     * @return type
     */
    function getFuncao() {
        return $this->funcao;
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
     * @param type $idFuncao
     */
    function setIdFuncao($idFuncao) {
        $this->idFuncao = $idFuncao;
    }
    
    
    public function __toString()
    {
        return $this->funcao;
    }
}
