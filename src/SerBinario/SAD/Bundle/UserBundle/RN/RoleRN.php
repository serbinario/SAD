<?php
namespace SerBinario\SAD\Bundle\UserBundle\RN;

use SerBinario\SAD\Bundle\UserBundle\DAO\RoleDAO;
use SerBinario\SAD\Bundle\UserBundle\Entity\Role;
/**
 * Description of RoleRN
 *
 * @author andrey
 */
class RoleRN 
{
    /**
     *
     * @var type 
     */
    private $roleDAO;
    
    /**
     * 
     * @param RoleDAO $roleDAO
     */
    public function __construct(RoleDAO $roleDAO) 
    {
        $this->roleDAO = $roleDAO;
    }
    
    /**
     * 
     * @return type
     */
    public function getRoles()
    {
        $result = $this->roleDAO->getRoles();
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getRole($id)
    {
        $result = $this->roleDAO->getRole($id);
        
        return $result;
    }
}
