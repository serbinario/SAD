<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estadocivil
 *
 * @ORM\Table(name="estadoCivil")
 * @ORM\Entity
 */
class Estadocivil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEstadoCivil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idestadocivil;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoCivil", type="string", length=45, nullable=true)
     */
    private $estadocivil;



    /**
     * Get idestadocivil
     *
     * @return integer 
     */
    public function getIdestadocivil()
    {
        return $this->idestadocivil;
    }

    /**
     * Set estadocivil
     *
     * @param string $estadocivil
     * @return Estadocivil
     */
    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;

        return $this;
    }

    /**
     * Get estadocivil
     *
     * @return string 
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
    }
    
    /**
     * 
     */
    public function __toString() 
    {
        return $this->estadocivil;
    }
}
