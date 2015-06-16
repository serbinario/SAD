<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis;

/**
 * Description of VagaDisponivelDAO
 *
 * @author fabio
 */
class VagaDisponivelDAO
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
    * @param VagasDisponiveis $vagasDisponiveis
    * @return boolean|VagasDisponiveis
    */
   public function save(VagasDisponiveis $vagasDisponiveis)
   {
       try {
           $this->maneger->persist($vagasDisponiveis);
           $this->maneger->flush();
           
           return $vagasDisponiveis;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param VagasDisponiveis $vagasDisponiveis
    * @return boolean|VagasDisponiveis
    */
   public function update(VagasDisponiveis $vagasDisponiveis)
   {
       try {
           $this->maneger->merge($vagasDisponiveis);
           $this->maneger->flush();
           
           return $vagasDisponiveis;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param VagasDisponiveis $vagasDisponiveis
    * @return boolean|VagasDisponiveis
    */
   public function remove(VagasDisponiveis $vagasDisponiveis)
   {
       try {
           $this->maneger->remove($vagasDisponiveis);
           $this->maneger->flush();
           
           return $vagasDisponiveis;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   public function findAllCandidatos() {
       
       try {
           
           $query = $this->maneger->createQuery("SELECT * FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato c "
                   . "JOIN c.vagaDisponivel v "
                   . "WHERE v.");
           
       } catch (Exception $ex) {
           return null;
       }
       
   }
}
