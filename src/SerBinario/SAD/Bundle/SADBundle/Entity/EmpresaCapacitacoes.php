<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpresaCursos
 *
 * @ORM\Table(name="empresa_capacitacoes")
 * @ORM\Entity
 */
class EmpresaCapacitacoes 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_empresa_capacitacoes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresaCapacitacoes;
    
    /**
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id_empresa")
     **/
    private $empresa;
    
    /**
     * @ORM\ManyToOne(targetEntity="Capacitacoes")
     * @ORM\JoinColumn(name="capacitacao_id", referencedColumnName="id_capacitacao")
     **/
    private $capacitacoes;
    
    /**
     * 
     * @return type
     */
    public function getIdEmpresaCapacitacoes() 
    {
        return $this->idEmpresaCapacitacoes;
    }

    /**
     * 
     * @return type
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * 
     * @param type $idEmpresaCapacitacoes
     */
    public function setIdEmpresaCapacitacoes($idEmpresaCapacitacoes) 
    {
        $this->idEmpresaCapacitacoes = $idEmpresaCapacitacoes;
    }

    /**
     * 
     * @param type $empresa
     */
    public function setEmpresa($empresa) 
    {
        $this->empresa = $empresa;
    }
    
    /**
     * 
     * @return type
     */
    public function getCapacitacoes() 
    {
        return $this->capacitacoes;
    }

    /**
     * 
     * @param type $capacitacoes
     */
    public function setCapacitacoes($capacitacoes) 
    {
        $this->capacitacoes = $capacitacoes;
    }
    
}