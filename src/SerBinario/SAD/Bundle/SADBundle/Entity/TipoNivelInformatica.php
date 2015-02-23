<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of TipoNivelInformatica
 *  
 * @ORM\Table(name="tipoNivelInformatica")
 * @ORM\Entity
 */
class TipoNivelInformatica {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoNivelInformatica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipoNivelInformatica", type="string", nullable=true)
     */
    private $tipoNivelInformatica;
    
    /**
     * 
     * @return type
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * 
     * @return type
     */
    public function getTipoNivelInformatica() 
    {
        return $this->tipoNivelInformatica;
    }

    /**
     * 
     * @param type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * 
     * @param type $tipoNivelInformatica
     */
    public function setTipoNivelInformatica($tipoNivelInformatica) 
    {
        $this->tipoNivelInformatica = $tipoNivelInformatica;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString()
    {
        return $this->getTipoNivelInformatica();
    }

}
