<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Informatica
 *
 * @ORM\Table(name="informatica", indexes={@ORM\Index(name="fk_informatica_tiposInformatica1_idx", columns={"tiposInformatica_idTiposInformatica"}), @ORM\Index(name="fk_informatica_curriculo1_idx", columns={"curriculo_idCurriculo"})})
 * @ORM\Entity
 */
class Informatica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idInformatica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinformatica;
    
    /**
     * @var \TipoNivelInformatica
     *
     * @ORM\ManyToOne(targetEntity="TipoNivelInformatica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoNivelInformatica", referencedColumnName="idTipoNivelInformatica")
     * })
     */
    private $tipoNivelInformatica;
    
    /**
     * @var \Tiposinformatica
     *
     * @ORM\ManyToOne(targetEntity="Tiposinformatica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tiposInformatica_idTiposInformatica", referencedColumnName="idTiposInformatica")
     * })
     */
    private $tiposinformaticatiposinformatica;

    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="informatica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;


    /**
     * Get idinformatica
     *
     * @return integer 
     */
    public function getIdinformatica()
    {
        return $this->idinformatica;
    }

    /**
     * Set tiposinformaticatiposinformatica
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tiposinformatica $tiposinformaticatiposinformatica
     * @return Informatica
     */
    public function setTiposinformaticatiposinformatica(\SerBinario\SAD\Bundle\SADBundle\Entity\Tiposinformatica $tiposinformaticatiposinformatica = null)
    {
        $this->tiposinformaticatiposinformatica = $tiposinformaticatiposinformatica;

        return $this;
    }

    /**
     * Get tiposinformaticatiposinformatica
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tiposinformatica 
     */
    public function getTiposinformaticatiposinformatica()
    {
        return $this->tiposinformaticatiposinformatica;
    }

    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Informatica
     */
    public function setCurriculocurriculo(\SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo = null)
    {
        $this->curriculocurriculo = $curriculocurriculo;

        return $this;
    }

    /**
     * Get curriculocurriculo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo 
     */
    public function getCurriculocurriculo()
    {
        return $this->curriculocurriculo;
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
     * @param type $tipoNivelInformatica
     */
    public function setTipoNivelInformatica($tipoNivelInformatica) 
    {
        $this->tipoNivelInformatica = $tipoNivelInformatica;
    }


}
