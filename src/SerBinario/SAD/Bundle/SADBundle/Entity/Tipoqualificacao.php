<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoqualificacao
 *
 * @ORM\Table(name="tipoQualificacao")
 * @ORM\Entity
 */
class Tipoqualificacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoQualificacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoqualificacao;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoQualificacao", type="string", length=45, nullable=true)
     */
    private $tipoqualificacao;



    /**
     * Get idtipoqualificacao
     *
     * @return integer 
     */
    public function getIdtipoqualificacao()
    {
        return $this->idtipoqualificacao;
    }

    /**
     * Set tipoqualificacao
     *
     * @param string $tipoqualificacao
     * @return Tipoqualificacao
     */
    public function setTipoqualificacao($tipoqualificacao)
    {
        $this->tipoqualificacao = $tipoqualificacao;

        return $this;
    }

    /**
     * Get tipoqualificacao
     *
     * @return string 
     */
    public function getTipoqualificacao()
    {
        return $this->tipoqualificacao;
    }
}
