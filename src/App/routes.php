<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 15/10/2019
 * Time: 15:01
 */

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\CadastroController;

$routes = new Routing\RouteCollection();
$routes->add('home', new Routing\Route('/', ['_controller' => 'App/Controller/CadastroController', '_method' => 'index']));
$routes->add('app_cadastro', new Routing\Route('/cadastro/formulario/{id}', ['_controller' => 'App/Controller/CadastroController', '_method' => 'formulario', 'id' => null]));
$routes->add('app_cadastro_excluir', new Routing\Route('/cadastro/excluir/{id}', ['_controller' => 'App/Controller/CadastroController', '_method' => 'excluir', 'id' => null]));
$routes->add('app_cadastro_find', new Routing\Route('/cadastro/find/{id}', ['_controller' => 'App/Controller/CadastroController', '_method' => 'find', 'id' => null]));
$routes->add('app_cadastro_importar', new Routing\Route('/cadastro/importar', ['_controller' => 'App/Controller/CadastroController', '_method' => 'importar']));

return $routes;