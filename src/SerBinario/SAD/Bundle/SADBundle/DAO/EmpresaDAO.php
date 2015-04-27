<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Empresa;

/**
 * Description of EmpresaDAO
 *
 * @author andrey
 */
class EmpresaDAO 
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
    * @param Empresa $empresa
    * @return boolean|Empresa
    */
   public function save(Empresa $empresa)
   {
       try {
           $this->maneger->persist($empresa);
           $this->maneger->flush();
           
           return $empresa;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Empresa $empresa
    * @return boolean|Empresa
    */
   public function update(Empresa $empresa)
   {
       try {
           $this->maneger->merge($empresa);
           $this->maneger->flush();
           
           return $empresa;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Empresa $empresa
    * @return boolean|Empresa
    */
   public function remove(Empresa $empresa)
   {
       try {
           $this->maneger->remove($empresa);
           $this->maneger->flush();
           
           return $empresa;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Empresa")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Empresa")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
