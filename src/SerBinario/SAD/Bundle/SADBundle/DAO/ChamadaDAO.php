<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Chamada;

/**
 * Description of ChamadaDAO
 *
 * @author andrey
 */
class ChamadaDAO
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
    * @param Chamada $curso
    * @return boolean|Chamada
    */
   public function save(Chamada $curso)
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
    * @param Chamada $curso
    * @return boolean|Chamada
    */
   public function update(Chamada $curso)
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
    * @param Chamada $curso
    * @return boolean|Chamada
    */
   public function remove(Chamada $chamada)
   {
       try {
           $this->maneger->remove($chamada);
           $this->maneger->flush();
           
           return $chamada;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Chamada")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Chamada")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }

    /**
     *
     * @return type
     */
    public function getChamada($data)
    {
        try {
            $arrayObj = $this->maneger->createQuery("SELECT c FROM SerBinario\SAD\Bundle\SADBundle\Entity\Chamada c "
                . "WHERE c.data = :data and c.status = true ORDER BY c.id DESC")
                ->setMaxResults(2)
                ->setParameter("data", $data);

            return $arrayObj->getResult();
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     *
     * @return type
     */
    public function getChamadaOne($data)
    {
        try {
            $arrayObj = $this->maneger->createQuery("SELECT c FROM SerBinario\SAD\Bundle\SADBundle\Entity\Chamada c "
                . "WHERE c.data = :data ORDER BY c.id DESC")
                ->setMaxResults(1)
                ->setParameter("data", $data);

            return $arrayObj->getResult();
        } catch (Exception $ex) {
            return null;
        }
    }
}
