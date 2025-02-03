<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

use App\Http\Router;
use App\Http\Request;



$router = new Router();

$router->registerRoute('/pokedex', __DIR__ . '/controllers/pokedex.php');
$router->registerRoute('/pokemon', __DIR__ . '/controllers/pokemon.php');
$uri = parse_url(Request::uri(), PHP_URL_PATH);

try {
    // Direct to the appropriate controller
    $controller = $router->direct($uri);
    require $controller;
} catch (App\Exceptions\NotFoundHttpException $e) {
    require view('404');
}

