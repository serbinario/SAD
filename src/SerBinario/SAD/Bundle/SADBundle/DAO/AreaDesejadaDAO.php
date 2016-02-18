<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada;

/**
 * Description of AreaDesejadaDAO
 *
 * @author fabio
 */
class AreaDesejadaDAO
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
    * @param AreaDesejada $areaDesejada
    * @return boolean|AreaDesejada
    */
   public function save(AreaDesejada $areaDesejada)
   {
       try {
           $this->maneger->persist($areaDesejada);
           $this->maneger->flush();
           
           return $areaDesejada;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param AreaDesejada $areaDesejada
    * @return boolean|AreaDesejada
    */
   public function update(AreaDesejada $areaDesejada)
   {
       try {
           $this->maneger->merge($areaDesejada);
           $this->maneger->flush();
           
           return $areaDesejada;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param AreaDesejada $areaDesejada
    * @return boolean|AreaDesejada
    */
   public function remove(AreaDesejada $areaDesejada)
   {
       try {
           $this->maneger->remove($areaDesejada);
           $this->maneger->flush();
           
           return $areaDesejada;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAllEmpresaDisp($idEmpresa)
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT DISTINCT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada a "
                   . "JOIN a.vagasDisponiveis v "
                   . "JOIN v.empresas e "
                   . "WHERE e.idEmpresa = :id")
                   ->setParameter("id", $idEmpresa);
           
           return $arrayObj->getArrayResult();
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAllVagasDisponiveis()
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada a "
                   . "JOIN a.vagasDisponiveis v "
                   . "WHERE a.idAreaDesejada = v.areaDesejada AND v.status = false");
           
           return $arrayObj->getResult();
       } catch (Exception $ex) {
           return null;
       }
   }
}
