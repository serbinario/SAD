<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\CursosType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Cursos controller.
 *
 * @Route("/cursos")
 */
class CursosController extends Controller
{
    /**
     * @Route("/saveCurso", name="saveCurso")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $cursoRN = $this->get("curso_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CursosType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $curso = $form->getData();
                               
                #Resultado da operação
                $result =  $cursoRN->save($curso);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Curso cadastrado realizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar o Curso');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new CursosType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridCurso", name="gridCurso")
     * @Template()
     */
    public function gridCursoAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "a.nomeCurso"
                );

            $entityJOIN = array();             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\Cursos"; 
            $columnWhereMain      = "";
            $whereValueMain       = "";
            
            $gridClass = new GridClass($this->getDoctrine()->getManager(), 
                    $parametros,
                    $columns,
                    $entity,
                    $entityJOIN,           
                    $columnWhereMain,
                    $whereValueMain);

            $resultCliente  = $gridClass->builderQuery();    
            $countTotal     = $gridClass->getCount();
            $countEventos   = count($resultCliente);

            for($i=0;$i < $countEventos; $i++)
            {
                $eventosArray[$i]['DT_RowId']     =  "row_".$resultCliente[$i]->getIdCursos();
                $eventosArray[$i]['id']           =  $resultCliente[$i]->getIdCursos();
                $eventosArray[$i]['nomeCurso']  =  $resultCliente[$i]->getNomeCurso();                
            }

            //Se a variável $sqlFilter estiver vazio
            if(!$gridClass->isFilter()){
                $countEventos = $countTotal;
            }

            $columns = array(               
                'draw'              => $parametros['draw'],
                'recordsTotal'      => "{$countTotal}",
                'recordsFiltered'   => "{$countEventos}",
                'data'              => $eventosArray               
            );

            return new JsonResponse($columns);
        }else{            
            return array();            
        }
    }
    
    /**
     * @Route("/editCurso/id/{id}", name="editCurso")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $cursoRN = $this->get("curso_rn");
        
        #Criando o formulário
        $form = $this->createForm(new CursosType());
        
        if($id) {
            #Recupera o empresa selecionado
            $cursoRecuperado = $cursoRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($cursoRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $curso = $form->getData();               
                
                #Resultado da operação
                $result =  $cursoRN->edit($curso);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Curso atualizado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar o Curso');
                }                 
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}
