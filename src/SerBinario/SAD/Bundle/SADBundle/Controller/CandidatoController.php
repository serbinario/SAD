<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\CandidatoType;

/**
 * Candidato controller.
 *
 * @Route("/candidato")
 */
class CandidatoController extends Controller
{
    
    /**
     * @Route("/save", name="save")
     * @Template()
     */
    public function saveAction(Request $request)
    {               
        #Recuperando o serviço do modelo
        $candidatoRN = $this->get("candidato_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CandidatoType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $candidato = $form->getData();
                
                #Resultado da operação
                $result =  $candidatoRN->save($candidato);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Candidato realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new CandidatoType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
   
}
