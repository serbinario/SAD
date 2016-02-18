<?php
namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SerBinario\SAD\Bundle\SADBundle\Form\EmpresaCursosType;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;

/**
 * Capacitacoes controller.
 *
 * @Route("/empresacursos")
 */
class EmpresaCursosController extends Controller
{
   /**
     * @Route("/saveEmpresaCursos", name="saveEmpresaCursos")
     * @Template()
     */
    public function saveAction(Request $request)
    {   
        #Recupera o usuário da sessão
        $usuario    = $this->get("security.context")->getToken()->getUser();
        
        #Recuperando o serviço do modelo
        $empresaCursoRN = $this->get("empresaCurso_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpresaCursosType());
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empresaCurso = $form->getData();
                               
                #Resultado da operação
                $result =  $empresaCursoRN->save($empresaCurso);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Dados cadastrado com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar cadastrar os dados');
                }
               
                
                #Criando o formulário
                $form = $this->createForm(new EmpresaCursosType());
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
    
    /**
     * @Route("/gridEmpresaCursos", name="gridEmpresaCursos")
     * @Template()
     */
    public function gridEmpresaCursosAction(Request $request) {
        
        if(GridClass::isAjax()) {
            
            $columns = array(
                "b.nomeCurso",
                "c.nomeEmpresa",
                "a.quantidade"
                );

            $entityJOIN = array("cursos", "empresa");             
            $eventosArray         = array();
            $parametros           = $request->request->all();       
            $entity               = "SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos"; 
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
                $eventosArray[$i]['DT_RowId']   =  "row_".$resultCliente[$i]->getIdEmpresaCursos();
                $eventosArray[$i]['id']         =  $resultCliente[$i]->getIdEmpresaCursos();
                $eventosArray[$i]['empresa']    =  $resultCliente[$i]->getEmpresa()->getNomeEmpresa();    
                $eventosArray[$i]['curso']      =  $resultCliente[$i]->getCursos()->getNomeCurso();    
                $eventosArray[$i]['quantidade'] =  $resultCliente[$i]->getQuantidade();    
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
     * @Route("/editEmpresaCursos/id/{id}", name="editEmpresaCursos")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {   
        
        #Recuperando o serviço do modelo
        $empresaCursoRN = $this->get("empresaCurso_rn");
        
        #Criando o formulário
        $form = $this->createForm(new EmpresaCursosType());
        
        if($id) {
            #Recupera o empresa selecionado
            $empresaCursoRecuperado = $empresaCursoRN->findById($id);
        }
               
        #Preenche o formulário com os dados do empresa
        $form->setData($empresaCursoRecuperado);
        
        #Verficando se é uma submissão
        if($request->getMethod() === "POST") {
                      
            #Repasando a requisição
            $form->handleRequest($request);
            
            #Verifica se os dados são válidos
            if($form->isValid()) {
                #Recuperando os dados
                $empresaCurso = $form->getData();               
                
                #Resultado da operação
                $result =  $empresaCursoRN->edit($empresaCurso);
                
                if($result) {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('success', 'Dados atualizados com sucesso');
                } else {
                    #Messagem de retorno
                    $this->get('session')->getFlashBag()->add('danger', 'Erro ao tentar Atualizar dados');
                }                 
               
                #Retorno
                return array("form" => $form->createView());
            }
        }
        
        #Retorno
        return array("form" => $form->createView());
    }
}