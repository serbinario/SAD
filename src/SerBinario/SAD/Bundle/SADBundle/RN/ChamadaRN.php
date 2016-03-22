<?php
namespace SerBinario\SAD\Bundle\SADBundle\RN;

use SerBinario\SAD\Bundle\SADBundle\DAO\ChamadaDAO;
use SerBinario\SAD\Bundle\SADBundle\Entity\Chamada;

/**
 * Description of EmpreendedorRN
 *
 * @author andrey
 */
class ChamadaRN
{
    /**
     *
     * @var type 
     */
    private $ChamadaDAO;
    
    /**
     * 
     * @param ChamadaDAO $ChamadaDAO
     */
    public function __construct(ChamadaDAO $ChamadaDAO)
    {
        $this->ChamadaDAO = $ChamadaDAO;
    }
    
    /**
     * 
     * @param Chamada $curso
     */
    public function save(Chamada $curso)
    {
        $result = $this->ChamadaDAO->save($curso);
        
        return $result;
    }
    
    /**
     * 
     * @param Chamada $curso
     */
    public function edit(Chamada $chamada)
    {
        $result = $this->ChamadaDAO->update($chamada);
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     */
    public function findById($id)
    {
        $result = $this->ChamadaDAO->findById($id);
        
        return $result;
    }

    /**
     * @param $data
     * @return \SerBinario\SAD\Bundle\SADBundle\DAO\type
     */
    public function getChamada($data)
    {
        $result = $this->ChamadaDAO->getChamada($data);

        return $result;
    }

    /**
     * @param $data
     * @return \SerBinario\SAD\Bundle\SADBundle\DAO\type
     */
    public function getChamadaOne($data)
    {
        $result = $this->ChamadaDAO->getChamadaOne($data);

        return $result;
    }
}
