<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\EmpreendedorType;

/**
 * Candidato controller.
 *
 * @Route("/empreendedor")
 */
class EmpreendedorController extends Controller
{
    
    /**
     * @Route("/save", name="saveEmpreendedor")
     * @Template()
     */
    public function saveAction(Request $request)
    {               
        #Recuperando o serviço do modelo
        $empreendedorRN = $this->get("empreendedor_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpreendedorType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empreendedor = $form->getData();
                
                #Alterando
                $result = $empreendedorRN->save($empreendedor);
                
                #Messagem de retorno
                $this->get('session')->getFlashBag()->add('sucess', 'Candidato realizado com sucesso');
                
                #Criando o formulário
                $form = $this->createForm(new EmpreendedorType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
   
}
