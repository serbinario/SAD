<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of TipoQualifLingExtrangeira
 * 
 * @ORM\Table(name="tipoQualifLingExtrangeira")
 * @ORM\Entity
 */
class TipoQualifLingExtrangeira 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoQualifLingExtrangeira", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoQualifLingExtrangeira", type="string", length=45, nullable=true)
     */
    private $tipoQualifLingExtrangeira;
    
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
    public function getTipoQualifLingExtrangeira() 
    {
        return $this->tipoQualifLingExtrangeira;
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
     * @param type $tipoQualifLingExtrangeira
     */
    public function setTipoQualifLingExtrangeira($tipoQualifLingExtrangeira) 
    {
        $this->tipoQualifLingExtrangeira = $tipoQualifLingExtrangeira;
    }

    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipoQualifLingExtrangeira();
    }
}
