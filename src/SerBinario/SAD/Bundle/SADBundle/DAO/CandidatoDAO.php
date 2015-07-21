<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Candidato;

/**
 * Description of CadidatoDAO
 *
 * @author andrey
 */
class CandidatoDAO 
{
   /**
    *
    * @var type 
    */
   private $maneger;
   
   /**
    * 
    * @param EntityManager $maneger
    */
   public function __construct(EntityManager $maneger) 
   {
       $this->maneger = $maneger;
   }
   
   /**
    * 
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function save(Candidato $candidato)
   {
       try {
           $this->maneger->persist($candidato);
           $this->maneger->flush();
           
           return $candidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function update(Candidato $candidato)
   {
       try {
           $this->maneger->merge($candidato);
           //var_dump($candidato->getTelefones());exit();
           $this->maneger->flush();
           
           return $candidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function remove(Candidato $candidato)
   {
       try {
           $this->maneger->remove($candidato);
           $this->maneger->flush();
           
           return $candidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param type $id
    * @return type
    */
   public function findById($id)
   {
       try {
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Candidato")->find($id);
           
           return $obj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAll()
   {
       try {
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Candidato")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findCandidatoVagaDisp($id)
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato a "
                   . "JOIN a.vagaDisponivel v "
                   . "WHERE v.idVagasDiponiveis = :id ")
                   ->setParameter("id", $id);
           
           return $arrayObj->getResult();
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @param type $idOpcao
    * @param type $idInforBusca
    * @return boolean
    */
   public function removeOpcoesDesejadasByUpdate($idOpcao, $idInforBusca)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("o");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Opcoesareadesejada", "o");
            $qb->innerJoin("o.informacoesbuscainformacoesbusca", "i");
            $qb->where("i.idinformacoesbusca =  ?1 AND o.idopcoesareadesejada NOT IN (?2)");
            $qb->setParameter(1, $idInforBusca);
            $qb->setParameter(2, $idOpcao);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idInforBusca
     * @return boolean
     */
    public function removeOpcoesDesejadasByUpdateVazio($idInforBusca)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("o");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Opcoesareadesejada", "o");
            $qb->innerJoin("o.informacoesbuscainformacoesbusca", "i");
            $qb->where("i.idinformacoesbusca =  ?1");
            $qb->setParameter(1, $idInforBusca);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
   
    /**
     * 
     * @param type $LgEst
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeLinguaEstrangeiraByUpdate($LgEst, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("l");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Linguaextrangeira", "l");
            $qb->innerJoin("l.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND l.idlinguaextrangeira NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $LgEst);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeLinguaEstrangeiraByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("l");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Linguaextrangeira", "l");
            $qb->innerJoin("l.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    /**
     * 
     * @param type $infor
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeInformaticaByUpdate($infor, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("i");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Informatica", "i");
            $qb->innerJoin("i.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND i.idinformatica NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $infor);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeInformaticaByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("i");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Informatica", "i");
            $qb->innerJoin("i.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    /**
     * 
     * @param type $formacao
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeFormcaoByUpdate($formacao, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("f");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Formacao", "f");
            $qb->innerJoin("f.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND f.idformacao NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $formacao);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeFormacaoByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("f");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Formacao", "f");
            $qb->innerJoin("f.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    /**
     * 
     * @param type $experiencia
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeExperienciaByUpdate($experiencia, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("e");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Experienciaprofissional", "e");
            $qb->innerJoin("e.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND e.idexperienciaprofissional NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $experiencia);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeExperienciaByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("e");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Experienciaprofissional", "e");
            $qb->innerJoin("e.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    /**
     * 
     * @param type $outrosCursos
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeOutrosCursosByUpdate($outrosCursos, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("o");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\OutrosCursos", "o");
            $qb->innerJoin("o.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND o.idOutrosCursos NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $outrosCursos);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeOutrosCursosByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("o");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\OutrosCursos", "o");
            $qb->innerJoin("o.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    /**
     * 
     * @param type $qualificacoes
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeQualificacoesByUpdate($qualificacoes, $idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("q");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Qualificacaofutura", "q");
            $qb->innerJoin("q.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1 AND q.idqualificacaofutura NOT IN (?2)");
            $qb->setParameter(1, $idCurriculo);
            $qb->setParameter(2, $qualificacoes);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    
    /**
     * 
     * @param type $idCurriculo
     * @return boolean
     */
    public function removeQualificacoesByUpdateVazio($idCurriculo)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("q");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\Qualificacaofutura", "q");
            $qb->innerJoin("q.curriculocurriculo", "c");
            $qb->where("c.idcurriculo =  ?1");
            $qb->setParameter(1, $idCurriculo);

            $result = $qb->getQuery()->getResult();

            foreach($result as $entity) {
                $this->maneger->remove($entity);
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}
