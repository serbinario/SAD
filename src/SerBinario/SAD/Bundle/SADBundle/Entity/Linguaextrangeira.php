<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Linguaextrangeira
 *
 * @ORM\Table(name="linguaExtrangeira", indexes={@ORM\Index(name="fk_cursos_curriculo1_idx", columns={"curriculo_idCurriculo"}), @ORM\Index(name="fk_linguaExtrangeira_tipoLinguaExtrangeira1_idx", columns={"tipoLinguaExtrangeira_idLinguaExtrangeira"})})
 * @ORM\Entity
 */
class Linguaextrangeira
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
     * @var \TipoQualifLingExtrangeira
     *
     * @ORM\ManyToOne(targetEntity="TipoQualifLingExtrangeira")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoQualifLingExtrangeira", referencedColumnName="idTipoQualifLingExtrangeira")
     * })
     */
    private $tipoQualifLingExtrangeira;


    /**
     * @var \Curriculo
     *
     * @ORM\ManyToOne(targetEntity="Curriculo", inversedBy="linguasExtrangeiras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curriculo_idCurriculo", referencedColumnName="idCurriculo")
     * })
     */
    private $curriculocurriculo;

    /**
     * @var \Tipolinguaextrangeira
     *
     * @ORM\ManyToOne(targetEntity="Tipolinguaextrangeira")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoLinguaExtrangeira_idLinguaExtrangeira", referencedColumnName="idLinguaExtrangeira")
     * })
     */
    private $tipolinguaextrangeiralinguaextrangeira;

    /**
     * 
     * @return type
     */
    public function getIdlinguaextrangeira() 
    {
        return $this->idlinguaextrangeira;
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
     * @param type $idlinguaextrangeira
     */
    public function setIdlinguaextrangeira($idlinguaextrangeira) 
    {
        $this->idlinguaextrangeira = $idlinguaextrangeira;
    }

    /**
     * 
     * @param  $tipoQualifLingExtrangeira
     */
    public function setTipoQualifLingExtrangeira($tipoQualifLingExtrangeira) 
    {
        $this->tipoQualifLingExtrangeira = $tipoQualifLingExtrangeira;
    }

    
    /**
     * Set curriculocurriculo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo $curriculocurriculo
     * @return Linguaextrangeira
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
     * Set tipolinguaextrangeiralinguaextrangeira
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira $tipolinguaextrangeiralinguaextrangeira
     * @return Linguaextrangeira
     */
    public function setTipolinguaextrangeiralinguaextrangeira(\SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira $tipolinguaextrangeiralinguaextrangeira = null)
    {
        $this->tipolinguaextrangeiralinguaextrangeira = $tipolinguaextrangeiralinguaextrangeira;

        return $this;
    }

    /**
     * Get tipolinguaextrangeiralinguaextrangeira
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira 
     */
    public function getTipolinguaextrangeiralinguaextrangeira()
    {
        return $this->tipolinguaextrangeiralinguaextrangeira;
    }
}
