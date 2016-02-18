<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCapacitacoes;

/**
 * Description of EmpresaDAO
 *
 * @author andrey
 */
 class EmpresaCapacitacoesDAO 
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
    * @param EmpresaCapacitacoes $empresaCapacitacoes
    * @return boolean|EmpresaCapacitacoes
    */
   public function save(EmpresaCapacitacoes $empresaCapacitacoes)
   {
       try {
           $this->maneger->persist($empresaCapacitacoes);
           $this->maneger->flush();
           
           return $empresaCapacitacoes;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param EmpresaCapacitacoes $empresaCapacitacoes
    * @return boolean|EmpresaCapacitacoes
    */
   public function update(EmpresaCapacitacoes $empresaCapacitacoes)
   {
       try {
           $this->maneger->merge($empresaCapacitacoes);
           $this->maneger->flush();
           
           return $empresaCapacitacoes;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param EmpresaCapacitacoes $empresaCapacitacoes
    * @return boolean|EmpresaCapacitacoes
    */
   public function remove(EmpresaCapacitacoes $empresaCapacitacoes)
   {
       try {
           $this->maneger->remove($empresaCapacitacoes);
           $this->maneger->flush();
           
           return $empresaCapacitacoes;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCapacitacoes")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCapacitacoes")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
