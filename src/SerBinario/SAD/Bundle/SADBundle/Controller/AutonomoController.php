<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;
use SerBinario\SAD\Bundle\SADBundle\Form\AutonomoType;

/**
 * Autonomo controller.
 *
 * @Route("/autonomo")
 */
class AutonomoController extends Controller
{
   /**
     * @Route("/saveAutonomo", name="saveAutonomo")
     * @Template()
     */
    public function saveAction(Request $request)
    {               
        #Recuperando o serviço do modelo
        $autonomoRN = $this->get("autonomo_rn");
        
        #Criando o formulário
        $form = $this->createForm(new AutonomoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $autonomo = $form->getData();
                
                #Resultado da operação
                $result =  $autonomoRN->save($autonomo);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Autonomo realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new AutonomoType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}
