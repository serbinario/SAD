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
     * @var boolean
     *
     * @ORM\Column(name="basicoInformatica", type="boolean", nullable=true)
     */
    private $basicoinformatica;

    /**
     * @var boolean
     *
     * @ORM\Column(name="intermediarioInformatica", type="boolean", nullable=true)
     */
    private $intermediarioinformatica;

    /**
     * @var boolean
     *
     * @ORM\Column(name="avancadoInformatica", type="boolean", nullable=true)
     */
    private $avancadoinformatica;

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
     * Set basicoinformatica
     *
     * @param boolean $basicoinformatica
     * @return Informatica
     */
    public function setBasicoinformatica($basicoinformatica)
    {
        $this->basicoinformatica = $basicoinformatica;

        return $this;
    }

    /**
     * Get basicoinformatica
     *
     * @return boolean 
     */
    public function getBasicoinformatica()
    {
        return $this->basicoinformatica;
    }

    /**
     * Set intermediarioinformatica
     *
     * @param boolean $intermediarioinformatica
     * @return Informatica
     */
    public function setIntermediarioinformatica($intermediarioinformatica)
    {
        $this->intermediarioinformatica = $intermediarioinformatica;

        return $this;
    }

    /**
     * Get intermediarioinformatica
     *
     * @return boolean 
     */
    public function getIntermediarioinformatica()
    {
        return $this->intermediarioinformatica;
    }

    /**
     * Set avancadoinformatica
     *
     * @param boolean $avancadoinformatica
     * @return Informatica
     */
    public function setAvancadoinformatica($avancadoinformatica)
    {
        $this->avancadoinformatica = $avancadoinformatica;

        return $this;
    }

    /**
     * Get avancadoinformatica
     *
     * @return boolean 
     */
    public function getAvancadoinformatica()
    {
        return $this->avancadoinformatica;
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
}
