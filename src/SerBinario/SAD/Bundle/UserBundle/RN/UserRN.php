<?php
namespace SerBinario\SAD\Bundle\UserBundle\RN;

use SerBinario\SAD\Bundle\UserBundle\DAO\UserDAO;
use SerBinario\SAD\Bundle\UserBundle\Entity\User;
/**
 * Description of UserRN
 *
 * @author andrey
 */
class UserRN 
{
    /**
     *
     * @var type 
     */
    private $userDAO;
    
    /**
     * 
     * @param UserDAO $userDAO
     */
    public function __construct(UserDAO $userDAO) 
    {
        $this->userDAO = $userDAO;
    }
    
     /**
     * 
     * @param User $user
     * @return User
     */
    public function save(User $user)
    {
       $result = $this->userDAO->save($user);
       
       return $result;
    }
    
    /**
     * 
     * @param User $user
     * @return User
     */
    public function update(User $user)
    {
        $result = $this->userDAO->update($user);
       
       return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function findById($id)
    {
       $result = $this->userDAO->findById($id);
       
       return $result;
    }
    
    /**
     * 
     * @param type $param
     * @return type
     */
    public function findByEmailOrUsename($param)
    {
       $result = $this->userDAO->findByEmailOrUsename($param);
       
       return $result;
    }
    
    /**
     * 
     * @return type
     */
    public function ultimoRegistro()
    {
       $result = $this->userDAO->ultimoRegistro();
       
       return $result;
    }
}
