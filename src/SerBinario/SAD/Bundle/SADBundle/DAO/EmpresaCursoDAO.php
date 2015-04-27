<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos;

/**
 * Description of EmpresaDAO
 *
 * @author andrey
 */
class EmpresaCursoDAO 
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
    * @param EmpresaCursos $empresaCursos
    * @return boolean|EmpresaCursos
    */
   public function save(EmpresaCursos $empresaCursos)
   {
       try {
           $this->maneger->persist($empresaCursos);
           $this->maneger->flush();
           
           return $empresaCursos;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param EmpresaCursos $empresaCursos
    * @return boolean|EmpresaCursos
    */
   public function update(EmpresaCursos $empresaCursos)
   {
       try {
           $this->maneger->merge($empresaCursos);
           $this->maneger->flush();
           
           return $empresaCursos;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param EmpresaCursos $empresaCursos
    * @return boolean|EmpresaCursos
    */
   public function remove(EmpresaCursos $empresaCursos)
   {
       try {
           $this->maneger->remove($empresaCursos);
           $this->maneger->flush();
           
           return $empresaCursos;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
