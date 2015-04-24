<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_empresa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresa;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome_empresa", type="string", nullable=false)
     */
    private $nomeEmpresa;
    
    /**
     * 
     * @return type
     */
    public function getIdEmpresa() 
    {
        return $this->idEmpresa;
    }

    /**
     * 
     * @return type
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * 
     * @param type $idEmpresa
     */
    public function setIdEmpresa($idEmpresa) 
    {
        $this->idEmpresa = $idEmpresa;
    }

    /**
     * 
     * @param type $nomeEmpresa
     */
    public function setNomeEmpresa($nomeEmpresa) 
    {
        $this->nomeEmpresa = $nomeEmpresa;
    }


}