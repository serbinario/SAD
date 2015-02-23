<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ramoatividadeautonomo
 *
 * @ORM\Table(name="ramoAtividadeAutonomo")
 * @ORM\Entity
 */
class Ramoatividadeautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRamoAtividadeAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idramoatividadeautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="ramoAtividadeAutonomo", type="string", length=45, nullable=true)
     */
    private $ramoatividadeautonomo;

    /**
     * Get idramoatividadeautonomo
     *
     * @return integer 
     */
    public function getIdramoatividadeautonomo()
    {
        return $this->idramoatividadeautonomo;
    }

    /**
     * Set ramoatividadeautonomo
     *
     * @param string $ramoatividadeautonomo
     * @return Ramoatividadeautonomo
     */
    public function setRamoatividadeautonomo($ramoatividadeautonomo)
    {
        $this->ramoatividadeautonomo = $ramoatividadeautonomo;

        return $this;
    }

    /**
     * Get ramoatividadeautonomo
     *
     * @return string 
     */
    public function getRamoatividadeautonomo()
    {
        return $this->ramoatividadeautonomo;
    }
    
}
