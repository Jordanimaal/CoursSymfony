<?php
declare(strict_types=1);
spl_autoload_register(static function($fqcn){
    $filePath= str_replace(['\\','App'], ['/','src'], $fqcn) . '.php';
    require_once(__DIR__.'/../'.$filePath);
});
use App\Infra\Http\Request;
use App\Infra\Routing\Router;
use App\Infra\Http\Response;
use App\Infra\DependencyInjection\Container;
use App\Infra\Log\Logger;
use App\Infra\DependencyInjection\ArgumentsResolver;


$request = Request::createFromGlobals();
$router = new Router();

$container = new Container(
    $request,
    $router,
    new Logger()
);

$argumentsResolver = new ArgumentsResolver($container);
$controller = $router->getController($request ->getPath());
$arguments = $container->resolveArguments($controller, '__invoke');
$response = $controller(...$arguments);

if(!$response instanceof Response) {
    throw new LogicException('Controller must return a ' .Response::class. 'object, ' .gettype($response). 'given.');
}

$response->send();


?>