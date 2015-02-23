<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipohorario
 *
 * @ORM\Table(name="tipoHorario")
 * @ORM\Entity
 */
class Tipohorario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoHorario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipohorario;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoHorario", type="string", length=45, nullable=true)
     */
    private $tipohorario;

    /**
     * Get idtipohorario
     *
     * @return integer 
     */
    public function getIdtipohorario()
    {
        return $this->idtipohorario;
    }

    /**
     * Set tipohorario
     *
     * @param string $tipohorario
     * @return Tipohorario
     */
    public function setTipohorario($tipohorario)
    {
        $this->tipohorario = $tipohorario;

        return $this;
    }

    /**
     * Get tipohorario
     *
     * @return string 
     */
    public function getTipohorario()
    {
        return $this->tipohorario;
    }
    
    /**
     * 
     */
    public function __toString() 
    {
        return $this->getTipohorario();
    }
    
    /**
     * 
     * @return type
     */
    public function getInformacaoBusca() 
    {
        return $this->informacaoBusca;
    }

    /**
     * 
     * @param type $informacaoBusca
     */
    public function setInformacaoBusca($informacaoBusca) 
    {
        $this->informacaoBusca = $informacaoBusca;
    }

    
}
