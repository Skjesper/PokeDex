<?php

declare(strict_types=1);

namespace App\Http;


use App\Exceptions\NotFoundHttpException;

class Router {
 
    private array $routes = [];

    public function getRoutes(): array {
        return $this->routes;
    }

   
    public function registerRoute(string $uri, string $controller): void {
       
        $uri = trim($uri, '/');
        $this->routes[$uri] = $controller;
    }

   
    public function direct(string $uri): string {
        // Normalize the URI by removing leading/trailing slashes
        $uri = trim($uri, '/');
        
        if (!array_key_exists($uri, $this->routes)) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->routes[$uri];
    }

    
}