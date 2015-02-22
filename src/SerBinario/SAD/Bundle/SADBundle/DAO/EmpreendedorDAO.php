<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use \SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor;
use Doctrine\ORM\EntityManager;
/**
 * Description of EmpreendedorDAO
 *
 * @author andrey
 */
class EmpreendedorDAO
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
    * @param Empreendedor $empreendedor
    * @return boolean
    */
   public function save(Empreendedor $empreendedor)
   {
       try {
           $this->maneger->persist($empreendedor);
           $this->maneger->flush();
           
           return $empreendedor;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Empreendedor $empreendedor
    * @return boolean
    */
   public function edit(Empreendedor $empreendedor)
   {
       try {
           $this->maneger->merge($empreendedor);
           $this->maneger->flush();
           
           return $empreendedor;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor")->find($id);
           
           return $obj;
       } catch (Exception $ex) {
           return null;
       }
   }
}
