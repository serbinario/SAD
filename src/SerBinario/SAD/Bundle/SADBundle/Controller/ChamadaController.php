<?php

namespace SerBinario\SAD\Bundle\SADBundle\Controller;

use SerBinario\SAD\Bundle\SADBundle\Entity\Chamada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use SerBinario\SAD\Bundle\SADBundle\Util\GridClass;
use Symfony\Component\HttpFoundation\JsonResponse;

use SerBinario\SAD\Bundle\SADBundle\Form\AreaDesejadaType;
use SerBinario\SAD\Bundle\SADBundle\Form\FuncaoType;

class ChamadaController extends Controller
{

    //Chamada ______________________________________________________________

    /**
     * @Route("/chamadaView", name="chamadaView")
     * @Template()
     */
    public function chamadaViewAction() {

        $chamadaRN = $this->get('chamada_rn');

        $data = new \DateTime('now');

        $dados = $chamadaRN->getChamada($data->format('y-m-d'));

        //var_dump($dados);exit();

        return array('chamadas' => $dados);

    }

    /**
     * @Route("/chamadaViewUser", name="chamadaViewUser")
     * @Template()
     */
    public function chamadaViewUserAction() {

        $chamadaRN = $this->get('chamada_rn');

        $data = new \DateTime('now');

        $dados = $chamadaRN->getChamada($data->format('y-m-d'));

        //var_dump($dados);exit();

        return array('chamadas' => $dados);

    }

    /**
     * @Route("/saveChamada", name="saveChamada")
     * @Template()
     */
    public function saveChamadaAction() {

        $mesa  = $this->get("session")->get('mesa');
        $data = new \DateTime('now');
        $chamada = new Chamada();
        $senha = 0;

        $chamadaRN = $this->get('chamada_rn');

        $ultChamada = $chamadaRN->getChamadaOne($data->format('y-m-d'));

        if($ultChamada){
            $senha = $ultChamada[0]->getSenha() + 1;
        } else {
            $senha = 1;
        }

        $chamada->setData($data);
        $chamada->setMesa($mesa);
        $chamada->setSenha($senha);

        $retorno = $chamadaRN->save($chamada);

        $this->get("session")->set('SenhaInicial', "");

        $this->get("session")->set('senha', $retorno->getSenha());

        return $this->redirect($this->generateUrl('homepage'));

    }

    /**
     * @Route("/getMesa", name="getMesa")
     * @Template()
     */
    public function getMesaAction(Request $request) {

        $mesa = $request->request->get('mesa');

        $this->get("session")->set('mesa', $mesa);

        return $this->redirect($this->generateUrl('homepage'));

    }

    /**
     * @Route("/dfSenhaInicial", name="dfSenhaInicial")
     * @Template()
     */
    public function dfSenhaInicialAction(Request $request) {

        return array();

    }

    /**
     * @Route("/senhaDf", name="senhaDf")
     * @Template()
     */
    public function senhaDfAction(Request $request) {

        $senha = $request->request->get('senha');

        $data = new \DateTime('now');
        $chamada = new Chamada();

        $chamadaRN = $this->get('chamada_rn');

        $chamada->setData($data);
        $chamada->setMesa('Redefinição de senha');
        $chamada->setSenha($senha);
        $chamada->setStatus(false);

        $retorno = $chamadaRN->save($chamada);

        return $this->redirect($this->generateUrl('dfSenhaInicial'));

    }

}
