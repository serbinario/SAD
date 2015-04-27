<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Cursos;

/**
 * Description of CursosDAO
 *
 * @author andrey
 */
class CursoDAO 
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
    * @param Cursos $curso
    * @return boolean|Cursos
    */
   public function save(Cursos $curso)
   {
       try {
           $this->maneger->persist($curso);
           $this->maneger->flush();
           
           return $curso;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Cursos $curso
    * @return boolean|Cursos
    */
   public function update(Cursos $curso)
   {
       try {
           $this->maneger->merge($curso);
           $this->maneger->flush();
           
           return $curso;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Cursos $curso
    * @return boolean|Cursos
    */
   public function remove(Cursos $curso)
   {
       try {
           $this->maneger->remove($curso);
           $this->maneger->flush();
           
           return $curso;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Cursos")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Cursos")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
