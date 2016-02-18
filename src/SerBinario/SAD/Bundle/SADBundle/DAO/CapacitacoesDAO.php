<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacoes;

/**
 * Description of EmpresaDAO
 *
 * @author andrey
 */
class CapacitacoesDAO 
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
    * @param Capacitacoes $capacitacao
    * @return boolean|Capacitacoes
    */
   public function save(Capacitacoes $capacitacao)
   {
       try {
           $this->maneger->persist($capacitacao);
           $this->maneger->flush();
           
           return $capacitacao;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Capacitacoes $capacitacao
    * @return boolean|Capacitacoes
    */
   public function update(Capacitacoes $capacitacao)
   {
       try {
           $this->maneger->merge($capacitacao);
           $this->maneger->flush();
           
           return $capacitacao;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Capacitacoes $capacitacao
    * @return boolean|Capacitacoes
    */
   public function remove(Capacitacoes $capacitacao)
   {
       try {
           $this->maneger->remove($capacitacao);
           $this->maneger->flush();
           
           return $capacitacao;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacoes")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacoes")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
