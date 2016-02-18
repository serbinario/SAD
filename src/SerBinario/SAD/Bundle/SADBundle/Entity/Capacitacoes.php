<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitacoes
 *
 * @ORM\Table(name="capacitacoes")
 * @ORM\Entity
 */
class Capacitacoes 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_capacitacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCapacitacao;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome_capacitacao", type="string", nullable=false)
     */
    private $nomeCapacitacao;
    
    /**
     * 
     * @return type
     */
    public function getIdCapacitacao() 
    {
        return $this->idCapacitacao;
    }

    /**
     * 
     * @return type
     */
    public function getNomeCapacitacao() 
    {
        return $this->nomeCapacitacao;
    }

    /**
     * 
     * @param type $idCapacitacao
     */
    public function setIdCapacitacao($idCapacitacao) 
    {
        $this->idCapacitacao = $idCapacitacao;
    }

    /**
     * 
     * @param type $nomeCapacitacao
     */
    public function setNomeCapacitacao($nomeCapacitacao) 
    {
        $this->nomeCapacitacao = $nomeCapacitacao;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getNomeCapacitacao();
    }

}