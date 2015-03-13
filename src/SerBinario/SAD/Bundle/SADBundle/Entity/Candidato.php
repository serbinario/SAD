<?php

namespace SerBinario\SAD\Bundle\SADBundle\Entity;

use SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo;
use SerBinario\SAD\Bundle\SADBundle\Entity\Cnh;
use SerBinario\SAD\Bundle\SADBundle\Entity\Telefonescandidato;
use Doctrine\ORM\Mapping as ORM;

/**
 * Candidato
 *
 * @ORM\Table(name="candidato", indexes={@ORM\Index(name="fk_candidato_sexo1_idx", columns={"sexo_idSexo"}), @ORM\Index(name="fk_candidato_estadoCivil1_idx", columns={"estadoCivil_idEstadoCivil"})})
 * @ORM\Entity
 */
class Candidato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCandidato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeCandidato", type="string", length=45, nullable=true)
     */
    private $nomecandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="cpfCandidato", type="string", length=11, nullable=true)
     */
    private $cpfcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="rgCandidato", type="string", length=7, nullable=true)
     */
    private $rgcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="enderecoCadidato", type="string", length=45, nullable=true)
     */
    private $enderecocadidato;

    /**
     * @var string
     *
     * @ORM\Column(name="bairroCandidato", type="string", length=45, nullable=true)
     */
    private $bairrocandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="cepCandidato", type="string", length=10, nullable=true)
     */
    private $cepcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="cidadeCandidato", type="string", length=45, nullable=true)
     */
    private $cidadecandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="ufCandidato", type="string", length=2, nullable=true)
     */
    private $ufcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="emailCandidato", type="string", length=45, nullable=true)
     */
    private $emailcandidato;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nascimentoCandidato", type="date", nullable=true)
     */
    private $nascimentocandidato;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnhCandidato", type="boolean", nullable=true)
     */
    private $cnhcandidato;

    /**
     * @var string
     *
     * @ORM\Column(name="outrasInformacoesCandidato", type="text", nullable=true)
     */
    private $outrasinformacoescandidato;

    /**
     * @var \Sexo
     *
     * @ORM\ManyToOne(targetEntity="Sexo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sexo_idSexo", referencedColumnName="idSexo")
     * })
     */
    private $sexosexo;

    /**
     * @var \Estadocivil
     *
     * @ORM\ManyToOne(targetEntity="Estadocivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estadoCivil_idEstadoCivil", referencedColumnName="idEstadoCivil")
     * })
     */
    private $estadocivilestadocivil;
    
    /**
     * @ORM\OneToOne(targetEntity="Curriculo", mappedBy="candidatocandidato", cascade={"all"})
     **/
    private $curriculo;
    
    /**
     * @ORM\OneToOne(targetEntity="Cnh", mappedBy="candidatocandidato", cascade={"all"})
     **/
    private $objCnh;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Telefonescandidato", mappedBy="candidatocandidato", cascade={"all"})
     */
    private $telefones;
    
    /**
     * @var \User
     * 
     * @ORM\ManyToOne(targetEntity="SerBinario\SAD\Bundle\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_user", referencedColumnName="id")
     * })
     */
    private $user;
    
    /**
     * Método construtor
     */
    public function __construct() 
    {
        $this->telefones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idcandidato
     *
     * @return integer 
     */
    public function getIdcandidato()
    {
        return $this->idcandidato;
    }

    /**
     * Set nomecandidato
     *
     * @param string $nomecandidato
     * @return Candidato
     */
    public function setNomecandidato($nomecandidato)
    {
        $this->nomecandidato = $nomecandidato;

        return $this;
    }

    /**
     * Get nomecandidato
     *
     * @return string 
     */
    public function getNomecandidato()
    {
        return $this->nomecandidato;
    }

    /**
     * Set cpfcandidato
     *
     * @param string $cpfcandidato
     * @return Candidato
     */
    public function setCpfcandidato($cpfcandidato)
    {
        $this->cpfcandidato = $cpfcandidato;

        return $this;
    }

    /**
     * Get cpfcandidato
     *
     * @return string 
     */
    public function getCpfcandidato()
    {
        return $this->cpfcandidato;
    }

    /**
     * Set rgcandidato
     *
     * @param string $rgcandidato
     * @return Candidato
     */
    public function setRgcandidato($rgcandidato)
    {
        $this->rgcandidato = $rgcandidato;

        return $this;
    }

    /**
     * Get rgcandidato
     *
     * @return string 
     */
    public function getRgcandidato()
    {
        return $this->rgcandidato;
    }

    /**
     * Set enderecocadidato
     *
     * @param string $enderecocadidato
     * @return Candidato
     */
    public function setEnderecocadidato($enderecocadidato)
    {
        $this->enderecocadidato = $enderecocadidato;

        return $this;
    }

    /**
     * Get enderecocadidato
     *
     * @return string 
     */
    public function getEnderecocadidato()
    {
        return $this->enderecocadidato;
    }

    /**
     * Set bairrocandidato
     *
     * @param string $bairrocandidato
     * @return Candidato
     */
    public function setBairrocandidato($bairrocandidato)
    {
        $this->bairrocandidato = $bairrocandidato;

        return $this;
    }

    /**
     * Get bairrocandidato
     *
     * @return string 
     */
    public function getBairrocandidato()
    {
        return $this->bairrocandidato;
    }

    /**
     * Set cepcandidato
     *
     * @param string $cepcandidato
     * @return Candidato
     */
    public function setCepcandidato($cepcandidato)
    {
        $this->cepcandidato = $cepcandidato;

        return $this;
    }

    /**
     * Get cepcandidato
     *
     * @return string 
     */
    public function getCepcandidato()
    {
        return $this->cepcandidato;
    }

    /**
     * Set cidadecandidato
     *
     * @param string $cidadecandidato
     * @return Candidato
     */
    public function setCidadecandidato($cidadecandidato)
    {
        $this->cidadecandidato = $cidadecandidato;

        return $this;
    }

    /**
     * Get cidadecandidato
     *
     * @return string 
     */
    public function getCidadecandidato()
    {
        return $this->cidadecandidato;
    }

    /**
     * Set ufcandidato
     *
     * @param string $ufcandidato
     * @return Candidato
     */
    public function setUfcandidato($ufcandidato)
    {
        $this->ufcandidato = $ufcandidato;

        return $this;
    }

    /**
     * Get ufcandidato
     *
     * @return string 
     */
    public function getUfcandidato()
    {
        return $this->ufcandidato;
    }

    /**
     * Set emailcandidato
     *
     * @param string $emailcandidato
     * @return Candidato
     */
    public function setEmailcandidato($emailcandidato)
    {
        $this->emailcandidato = $emailcandidato;

        return $this;
    }

    /**
     * Get emailcandidato
     *
     * @return string 
     */
    public function getEmailcandidato()
    {
        return $this->emailcandidato;
    }

    /**
     * Set nascimentocandidato
     *
     * @param \DateTime $nascimentocandidato
     * @return Candidato
     */
    public function setNascimentocandidato($nascimentocandidato)
    {
        $this->nascimentocandidato = $nascimentocandidato;

        return $this;
    }

    /**
     * Get nascimentocandidato
     *
     * @return \DateTime 
     */
    public function getNascimentocandidato()
    {
        return $this->nascimentocandidato;
    }

    /**
     * Set cnhcandidato
     *
     * @param boolean $cnhcandidato
     * @return Candidato
     */
    public function setCnhcandidato($cnhcandidato)
    {
        $this->cnhcandidato = $cnhcandidato;

        return $this;
    }

    /**
     * Get cnhcandidato
     *
     * @return boolean 
     */
    public function getCnhcandidato()
    {
        return $this->cnhcandidato;
    }

    /**
     * Set outrasinformacoescandidato
     *
     * @param string $outrasinformacoescandidato
     * @return Candidato
     */
    public function setOutrasinformacoescandidato($outrasinformacoescandidato)
    {
        $this->outrasinformacoescandidato = $outrasinformacoescandidato;

        return $this;
    }

    /**
     * Get outrasinformacoescandidato
     *
     * @return string 
     */
    public function getOutrasinformacoescandidato()
    {
        return $this->outrasinformacoescandidato;
    }

    /**
     * Set sexosexo
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Sexo $sexosexo
     * @return Candidato
     */
    public function setSexosexo(\SerBinario\SAD\Bundle\SADBundle\Entity\Sexo $sexosexo = null)
    {
        $this->sexosexo = $sexosexo;

        return $this;
    }

    /**
     * Get sexosexo
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Sexo 
     */
    public function getSexosexo()
    {
        return $this->sexosexo;
    }

    /**
     * Set estadocivilestadocivil
     *
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Estadocivil $estadocivilestadocivil
     * @return Candidato
     */
    public function setEstadocivilestadocivil(\SerBinario\SAD\Bundle\SADBundle\Entity\Estadocivil $estadocivilestadocivil = null)
    {
        $this->estadocivilestadocivil = $estadocivilestadocivil;

        return $this;
    }

    /**
     * Get estadocivilestadocivil
     *
     * @return \SerBinario\SAD\Bundle\SADBundle\Entity\Estadocivil 
     */
    public function getEstadocivilestadocivil()
    {
        return $this->estadocivilestadocivil;
    }
    
    /**
     * 
     * @return type
     */
    public function getCurriculo() 
    {
        return $this->curriculo;
    }

    /**
     * 
     * @param type $curriculo
     */
    public function setCurriculo(Curriculo $curriculo) 
    {
        $curriculo->setCandidatocandidato($this);
        
        $this->curriculo = $curriculo;
    }

    /**
     * 
     * @return type
     */
    public function getObjCnh() 
    {
        return $this->objCnh;
    }

    /**
     * 
     * @param Cnh $objCnh
     */
    public function setObjCnh(Cnh $objCnh) 
    {
        $objCnh->setCandidatocandidato($this);
        
        $this->objCnh = $objCnh;
    }
    
    /**
     * 
     * @return type
     */
    public function getTelefones() 
    {
        return $this->telefones->toArray();
    }
    
    /**
     * 
     * @param type $telefones
     */
    public function setTelefones($telefones) 
    {
        foreach ($telefones as $telefone) {            
            $telefone->setCandidatocandidato($this);
        }
        
        $this->telefones = $telefones;
    }

    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\SADBundle\Entity\Telefonescandidato $telefoneCandidato
     */
    public function addTelefone(Telefonescandidato $telefoneCandidato)
    {
        $telefoneCandidato->setCandidatocandidato($this);
        
        $this->telefones[] = $telefoneCandidato;
    }

    /**
     * 
     * @return type
     */
    function getUser() {
        return $this->user;
    }
    
    /**
     * 
     * @param \SerBinario\SAD\Bundle\UserBundle\Entity\User $user
     */
    function setUser(\SerBinario\SAD\Bundle\UserBundle\Entity\User $user) {
        $this->user = $user;
    }


}