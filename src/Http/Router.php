<?php

declare(strict_types=1);

namespace App\Http;

use Exception;
use App\Exceptions\NotFoundHttpException;

class Router {
    /**
     * Array to store registered routes and their corresponding controllers
     */
    private array $routes = [];

    /**
     * Get all registered routes
     */
    public function getRoutes(): array {
        return $this->routes;
    }

    /**
     * Register a new route
     * 
     * @param string $uri The route URI
     * @param string $controller Path to the controller file
     * @return void
     */
    public function registerRoute(string $uri, string $controller): void {
        // Normalize the URI by removing leading/trailing slashes
        $uri = trim($uri, '/');
        $this->routes[$uri] = $controller;
    }

    /**
     * Direct the request to the appropriate controller
     * 
     * @param string $uri The requested URI
     * @return string The controller path
     * @throws Exception If no route is defined for the URI
     */
    public function direct(string $uri): string {
        // Normalize the URI by removing leading/trailing slashes
        $uri = trim($uri, '/');
        
        if (!array_key_exists($uri, $this->routes)) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->routes[$uri];
    }
}