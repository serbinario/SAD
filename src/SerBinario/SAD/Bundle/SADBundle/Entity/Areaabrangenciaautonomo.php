<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areaabrangenciaautonomo
 *
 * @ORM\Table(name="areaAbrangenciaAutonomo")
 * @ORM\Entity
 */
class Areaabrangenciaautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAreaAbrangenciaAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idareaabrangenciaautonomo;

    /**
     * @var string
     *
     * @ORM\Column(name="areaAbrangenciaAutonomo", type="string", length=45, nullable=true)
     */
    private $areaabrangenciaautonomo;



    /**
     * Get idareaabrangenciaautonomo
     *
     * @return integer 
     */
    public function getIdareaabrangenciaautonomo()
    {
        return $this->idareaabrangenciaautonomo;
    }

    /**
     * Set areaabrangenciaautonomo
     *
     * @param string $areaabrangenciaautonomo
     * @return Areaabrangenciaautonomo
     */
    public function setAreaabrangenciaautonomo($areaabrangenciaautonomo)
    {
        $this->areaabrangenciaautonomo = $areaabrangenciaautonomo;

        return $this;
    }

    /**
     * Get areaabrangenciaautonomo
     *
     * @return string 
     */
    public function getAreaabrangenciaautonomo()
    {
        return $this->areaabrangenciaautonomo;
    }
}
