<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo;

/**
 * Description of AutonomoDAO
 *
 * @author andrey
 */
class AutonomoDAO 
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
    * @param Autonomo $autonomo
    * @return boolean
    */
   public function save(Autonomo $autonomo)
   {
       try {
           $this->maneger->persist($autonomo);
           $this->maneger->flush();
           
           return $autonomo;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Autonomo $autonomo
    * @return boolean|Candidato
    */
   public function update(Autonomo $autonomo)
   {
       try {
           $this->maneger->merge($autonomo);
           $this->maneger->flush();
           
           return $autonomo;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo")->find($id);
           
           return $obj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
