<?php
namespace SerBinario\SAD\Bundle\SADBundle\DAO;

use Doctrine\ORM\EntityManager;
use SerBinario\SAD\Bundle\SADBundle\Entity\Candidato;

/**
 * Description of CadidatoDAO
 *
 * @author andrey
 */
class CandidatoDAO 
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
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function save(Candidato $candidato)
   {
       try {
           $this->maneger->persist($candidato);
           $this->maneger->flush();
           
           return $candidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function update(Candidato $candidato)
   {
       try {
           $this->maneger->merge($candidato);
           //var_dump($candidato->getTelefones());exit();
           $this->maneger->flush();
           
           return $candidato;
       } catch (Exception $ex) {
           return false;
       }
   }
   
   /**
    * 
    * @param Candidato $candidato
    * @return boolean|Candidato
    */
   public function remove(Candidato $candidato)
   {
       try {
           $this->maneger->remove($candidato);
           $this->maneger->flush();
           
           return $candidato;
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
           $obj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Candidato")->find($id);
           
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
           $arrayObj = $this->maneger->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Candidato")->findAll();
           
           return $arrayObj;
       } catch (Exception $ex) {
           return null;
       }
   }
   
   /**
    * 
    * @return type
    */
   public function findAllTeste()
   {
       try {
           $arrayObj = $this->maneger->createQuery("SELECT a FROM SerBinario\SAD\Bundle\SADBundle\Entity\Candidato a "
                   . "JOIN a.sexosexo b "
                   . "JOIN a.curriculo c "
                   . "JOIN c.informacaoBusca d "
                   . "JOIN c.experienciasProfissionais e "
                   . "JOIN c.informatica f "
                   . "JOIN c.linguasExtrangeiras g "
                   . "JOIN d.opcoesdesejadas h "
                   . "JOIN h.vagas i "
                   . "WHERE i.idVagas = '1' AND c.idcurriculo = g.curriculocurriculo ORDER BY a.nomecandidato asc");
           
           return $arrayObj->getResult();
       } catch (Exception $ex) {
           return null;
       }
   }
   
}
