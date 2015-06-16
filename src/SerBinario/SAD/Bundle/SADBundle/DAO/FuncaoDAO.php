<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Funcao;

/**
 * Description of FuncaoDAO
 *
 * @author fabio
 */
class FuncaoDAO
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
    * @param Funcao $funcao
    * @return boolean|Funcao
    */
   public function save(Funcao $funcao)
   {
       try {
           $this->maneger->persist($funcao);
           $this->maneger->flush();
           
           return $funcao;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Funcao $funcao
    * @return boolean|Funcao
    */
   public function update(Funcao $funcao)
   {
       try {
           $this->maneger->merge($funcao);
           $this->maneger->flush();
           
           return $funcao;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Funcao $funcao
    * @return boolean|Funcao
    */
   public function remove(Funcao $funcao)
   {
       try {
           $this->maneger->remove($funcao);
           $this->maneger->flush();
           
           return $funcao;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Funcao")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Funcao")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
