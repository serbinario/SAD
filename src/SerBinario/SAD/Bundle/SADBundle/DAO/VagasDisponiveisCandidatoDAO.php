<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato;

/**
 * Description of VagasDisponiveisCandidatoDAO
 *
 * @author andrey
 */
class VagasDisponiveisCandidatoDAO 
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
    * @param VagasDisponiveisCandidato $vagasDisponiveisCandidato
    * @return boolean|VagasDisponiveisCandidato
    */
   public function save(VagasDisponiveisCandidato $vagasDisponiveisCandidato)
   {
       try {
           $this->maneger->persist($vagasDisponiveisCandidato);
           $this->maneger->flush();
           
           return $vagasDisponiveisCandidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param VagasDisponiveisCandidato $vagasDisponiveisCandidato
    * @return boolean|VagasDisponiveisCandidato
    */
   public function update(VagasDisponiveisCandidato $vagasDisponiveisCandidato)
   {
       try {
           $this->maneger->merge($vagasDisponiveisCandidato);
           $this->maneger->flush();
           
           return $vagasDisponiveisCandidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param VagasDisponiveisCandidato $vagasDisponiveisCandidato
    * @return boolean|VagasDisponiveisCandidato
    */
   public function remove(VagasDisponiveisCandidato $vagasDisponiveisCandidato)
   {
       try {
           $this->maneger->remove($vagasDisponiveisCandidato);
           $this->maneger->flush();
           
           return $vagasDisponiveisCandidato;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato")->find($id);
           
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
           
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
     * 
     * @param type $LgEst
     * @param type $idCurriculo
     * @return boolean
     */
    public function vagasDipsCandAprovadasByUpdate($idVD, $idVDC)
    {
        try {
            $qb = $this->maneger->createQueryBuilder();
            $qb->select("v");
            $qb->from("SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveisCandidato", "v");
            $qb->innerJoin("v.vagasDisponiveis", "c");
            $qb->where("c.idVagasDiponiveis = ?1 AND v.idVagasDisponiveisCandidato NOT IN (?2)");
            $qb->setParameter(1, $idVD);
            $qb->setParameter(2, $idVDC);

            $result = $qb->getQuery()->getResult();
            
            //var_dump($result);exit();
            
            foreach($result as $entity) {
                $entity->setAprovado(true);
                $this->maneger->merge($entity);
                $this->maneger->flush();
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
  
}
