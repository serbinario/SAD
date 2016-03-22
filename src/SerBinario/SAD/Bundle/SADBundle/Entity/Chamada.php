<?php
namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table(name="chamada")
 * @ORM\Entity
 */
class Chamada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date", nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="mesa", type="string", length=45, nullable=true)
     */
    private $mesa;

    /**
     * @var integer
     *
     * @ORM\Column(name="senha", type="integer", nullable=true)
     */
    private $senha;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getMesa()
    {
        return $this->mesa;
    }

    /**
     * @param string $mesa
     */
    public function setMesa($mesa)
    {
        $this->mesa = $mesa;
    }

    /**
     * @return int
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param int $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}
