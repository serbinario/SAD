<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qtdpessoasenvolvidasautonomo
 *
 * @ORM\Table(name="qtdPessoasEnvolvidasAutonomo")
 * @ORM\Entity
 */
class Qtdpessoasenvolvidasautonomo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idQtdPessoasEnvolvidasAutonomo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idqtdpessoasenvolvidasautonomo;

    /**
     * @var integer
     *
     * @ORM\Column(name="qtdPessoasEnvolvidasAutonomo", type="integer", nullable=true)
     */
    private $qtdpessoasenvolvidasautonomo;



    /**
     * Get idqtdpessoasenvolvidasautonomo
     *
     * @return integer 
     */
    public function getIdqtdpessoasenvolvidasautonomo()
    {
        return $this->idqtdpessoasenvolvidasautonomo;
    }

    /**
     * Set qtdpessoasenvolvidasautonomo
     *
     * @param integer $qtdpessoasenvolvidasautonomo
     * @return Qtdpessoasenvolvidasautonomo
     */
    public function setQtdpessoasenvolvidasautonomo($qtdpessoasenvolvidasautonomo)
    {
        $this->qtdpessoasenvolvidasautonomo = $qtdpessoasenvolvidasautonomo;

        return $this;
    }

    /**
     * Get qtdpessoasenvolvidasautonomo
     *
     * @return integer 
     */
    public function getQtdpessoasenvolvidasautonomo()
    {
        return $this->qtdpessoasenvolvidasautonomo;
    }
}
