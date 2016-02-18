<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpresaCursos
 *
 * @ORM\Table(name="empresa_cursos")
 * @ORM\Entity
 */
class EmpresaCursos 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_empresa_cursos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresaCursos;
    
    /**
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id_empresa")
     **/
    private $empresa;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cursos")
     * @ORM\JoinColumn(name="cursos_id", referencedColumnName="id_cursos")
     **/
    private $cursos;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;
    
    /**
     * 
     * @return type
     */
    public function getIdEmpresaCursos() 
    {
        return $this->idEmpresaCursos;
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
     * @return type
     */
    public function getCursos() 
    {
        return $this->cursos;
    }

    /**
     * 
     * @param type $idEmpresaCursos
     */
    public function setIdEmpresaCursos($idEmpresaCursos) 
    {
        $this->idEmpresaCursos = $idEmpresaCursos;
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
     * @param type $cursos
     */
    public function setCursos($cursos) 
    {
        $this->cursos = $cursos;
    }
    
    /**
     * 
     * @return type
     */
    public function getQuantidade() 
    {
        return $this->quantidade;
    }

    /**
     * 
     * @param type $quantidade
     */
    public function setQuantidade($quantidade) 
    {
        $this->quantidade = $quantidade;
    }




}
