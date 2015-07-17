<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Vagas;

/**
 * Description of VagaDAO
 *
 * @author fabio
 */
class VagaDAO 
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
    * @param Vagas $empresa
    * @return boolean|Vagas
    */
   public function save(Vagas $empresa)
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
    * @param Vagas $empresa
    * @return boolean|Vagas
    */
   public function update(Vagas $empresa)
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
    * @param Vagas $empresa
    * @return boolean|Vagas
    */
   public function remove(Vagas $empresa)
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Vagas")->find($id);
           
           return $obj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   public function findVagasAreaProAjax($id) {
        try {
            $query = $this->maneger->createQuery("SELECT v FROM SerBinario\SAD\Bundle\SADBundle\Entity\Vagas v "
                    . "JOIN v.areaDesejada a "
                    . "WHERE a.idAreaDesejada = :id")
                    ->setParameter(":id", $id);
            
            return $query->getArrayResult();
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Vagas")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAllVagasDisponiveis($id)
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT v FROM SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis v "
                   . "JOIN v.vagas d "
                   . "JOIN v.areaDesejada a "
                   . "WHERE v.vagas = d.idVagas AND v.areaDesejada = :id AND v.status = false")
                   ->setParameter("id", $id);
           
           return $arrayObj->getResult();
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAllVagasDisp($idAreaDesejada)
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT v FROM SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis v "
                   . "JOIN v.areaDesejada d "
                   . "WHERE d.idAreaDesejada = :id AND v.areaDesejada = d.idAreaDesejada AND v.status = false")
                   ->setParameter("id", $idAreaDesejada);
           
           return $arrayObj->getResult();
       } catch (Exception $ex) {
           return null;
       }
   }
}
