<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexo
 *
 * @ORM\Table(name="sexo")
 * @ORM\Entity
 */
class Sexo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSexo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsexo;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=15, nullable=true)
     */
    private $descricao;



    /**
     * Get idsexo
     *
     * @return integer 
     */
    public function getIdsexo()
    {
        return $this->idsexo;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Sexo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getDescricao();
    }
}
