<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 15/10/2019
 * Time: 14:44
 */

namespace App\Controller;

set_time_limit(-1);

use App\Service\CadastroManager;
use Symfony\Component\HttpFoundation\Response;

class CadastroController extends AbstractController
{

    /** @var  CadastroManager */
    protected $serviceManager;

    public function init()
    {
        $this->serviceManager = new CadastroManager();
    }

    /**
     * Lista todo conteúdo
     * @return Response
     */
    public function index()
    {
        $this->viewTemplate = 'cadastro/index.phtml';

        $rowSet = $this->serviceManager->listar();

        return $this->render(['rowSet' => $rowSet]);
    }

    /**
     * Visualizar os dados de um registro
     * @return Response
     */
    public function find()
    {
        if ($this->request->isMethod('GET')) {
            $this->response
                ->setContent('Requisição não permitida')
                ->headers->set('Location', '/');
            return $this->response;
        }

        $id = $this->get('id');

        if (!$id) {
            return $this->renderJson('Registro inválido.');
        }

        $response = $this->serviceManager->find($id);

        return $this->renderJson($response);
    }

    /**
     * Trata a requisição para inserção ou update
     * @return Response
     */
    public function formulario()
    {
        $this->viewTemplate = 'cadastro/formulario.phtml';

        if ($this->request->isMethod('GET')) {
            $this->response
                ->setContent('Requisição não permitida')
                ->headers->set('Location', '/');
            return $this->response;
        }

        $id = $this->get('id');
        $data = json_decode($this->request->getContent());

        if ($id) {
            $response = $this->serviceManager->update($id, $data);
        } else {
            $response = $this->serviceManager->add($data);
        }

        return $this->renderJson($response);
    }

    /**
     * Importação de dados
     * @return Response
     */
    public function importar()
    {
        $this->viewTemplate = 'cadastro/index.phtml';

        if ($this->request->isMethod('GET')) {
            $this->response
                ->setContent('Requisição não permitida')
                ->headers->set('Location', '/');
            return $this->response;
        }

        if (!$_FILES['importarFile']) {
            return $this->render('Arquivo inválido');
        }

        $response = $this->serviceManager->importarDados($_FILES['importarFile']['tmp_name']);

        header('Location: /');
        exit;
    }

    /**
     * @return Response
     */
    public function excluir()
    {
        $this->viewTemplate = 'cadastro/formulario.phtml';

        if ($this->request->isMethod('GET')) {
            $this->response
                ->setContent('Requisição não permitida')
                ->headers->set('Location', '/');
            return $this->response;
        }

        $id = $this->get('id');

        if (!$id) {
            return $this->renderJson('Registro inválido.');
        }

        $response = $this->serviceManager->excluir($id);

        return $this->renderJson($response);
    }
}