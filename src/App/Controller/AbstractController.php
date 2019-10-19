<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 16/10/2019
 * Time: 16:18
 */

namespace App\Controller;

use App\Util\JsonModel;
use App\Util\Transport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbstractController
{

    use Transport;

    /** @var  Request */
    protected $request;

    protected $parameters;

    /** @var  Response */
    protected $response;

    protected $serviceManager;

    protected $viewTemplate;

    /**
     * AbstractController constructor.
     */
    public function __construct($request, array $parameters = [])
    {
        $this->request = $request;
        $this->parameters = $parameters;
        $this->response = new Response();

        $this->init();
    }

    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Recupera um parâmetro específico
     * @param $param
     * @return mixed
     */
    public function get($param)
    {
        if (key_exists($param, $this->parameters)) {
            return $this->parameters[$param];
        }

        return false;
    }

    /**
     * Renderia o conteúdo da view
     * @param array $params
     * @return Response
     */
    public function render(array $params = [])
    {
        ob_start();
            include sprintf(__DIR__.'/../View/%s', $this->viewTemplate);

            $content = ob_get_contents();
        ob_end_clean();

        return new Response($content);
    }

    /**
     * Renderiza como Json
     * @param array $params
     * @return Response
     */
    public function renderJson($params = [])
    {
        return new JsonModel(json_encode($params));
    }
}