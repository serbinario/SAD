<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formalizacao
 *
 * @ORM\Table(name="formalizacao")
 * @ORM\Entity
 */
class Formalizacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFormalizacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformalizacao;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoFormalizacao", type="string", length=45, nullable=true)
     */
    private $tipoformalizacao;



    /**
     * Get idformalizacao
     *
     * @return integer 
     */
    public function getIdformalizacao()
    {
        return $this->idformalizacao;
    }

    /**
     * Set tipoformalizacao
     *
     * @param string $tipoformalizacao
     * @return Formalizacao
     */
    public function setTipoformalizacao($tipoformalizacao)
    {
        $this->tipoformalizacao = $tipoformalizacao;

        return $this;
    }

    /**
     * Get tipoformalizacao
     *
     * @return string 
     */
    public function getTipoformalizacao()
    {
        return $this->tipoformalizacao;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoformalizacao();
    }
}
