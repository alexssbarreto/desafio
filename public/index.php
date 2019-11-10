<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../src/App/routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$parameters = $matcher->match($context->getPathInfo());

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);

    include sprintf(__DIR__ . '/../src/%s.php', $_controller);

    $_controller = str_replace('/', '\\', $_controller);

    $controller = new $_controller($request, $parameters);
    $response = $controller->{$_method}();

} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Página não encontrada.', 404);
} catch (Exception $exception) {
    $response = new Response('Um erro ocorreu. Contate o Administrador.', 500);
}

if ($response instanceof \App\Util\JsonModel) {
    $response = new Response($response->getContent());
    return $response->send();
}

$response->prepare($request);
$content = $response;
?>

<?php include_once('../src/App/View/layout.phtml') ?>