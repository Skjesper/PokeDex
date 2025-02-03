<?php

declare(strict_types=1);

namespace tests\Http;


use PHPUnit\Framework\TestCase;
use App\Http\Router;

use function PHPUnit\Framework\assertSame;

class RouterTest extends TestCase {

    public function test_route_request() 
{
    $router = new Router();
    $router->registerRoute('pokedex', 'PokedexController');
    
    $this->assertSame('PokedexController', $router->direct('pokedex'));

}
    public function test_route_not_found()
    {
        $router = new Router();
        $router->registerRoute('pokedex', 'PokedexController');

        $this->expectException(\App\Exceptions\NotFoundHttpException::class);
        $router->direct('invalid-route');
    }
    
}

