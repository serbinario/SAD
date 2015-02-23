<?php

namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/home", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }
    
    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $req = $request->request->all();
        
        $username = $req['username'];
        $password = $req['password'];
        
        if($username === "sad" && $password === "sad") {
            return $this->redirect($this->generateUrl("home")); 
        } else {
            $this->get("session")->getFlashBag()->add('danger', "Login ou senha inválidos");
            return $this->redirect($this->generateUrl("index")); 
        }       
    }
    
    /**
     * @Route("/logout", name="logout")
     * @Template()
     */
    public function logoutAction()
    {
        return $this->redirect($this->generateUrl("index"));
    }
}
