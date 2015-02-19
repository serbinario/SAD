<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipolinguaextrangeira
 *
 * @ORM\Table(name="tipoLinguaExtrangeira")
 * @ORM\Entity
 */
class Tipolinguaextrangeira
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLinguaExtrangeira", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlinguaextrangeira;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoLinguaExtrangeira", type="string", length=45, nullable=true)
     */
    private $tipolinguaextrangeira;



    /**
     * Get idlinguaextrangeira
     *
     * @return integer 
     */
    public function getIdlinguaextrangeira()
    {
        return $this->idlinguaextrangeira;
    }

    /**
     * Set tipolinguaextrangeira
     *
     * @param string $tipolinguaextrangeira
     * @return Tipolinguaextrangeira
     */
    public function setTipolinguaextrangeira($tipolinguaextrangeira)
    {
        $this->tipolinguaextrangeira = $tipolinguaextrangeira;

        return $this;
    }

    /**
     * Get tipolinguaextrangeira
     *
     * @return string 
     */
    public function getTipolinguaextrangeira()
    {
        return $this->tipolinguaextrangeira;
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() 
    {
        return $this->getTipolinguaextrangeira();
    }
}
