<?php

namespace Core;

use Core\Middlewares\Middleware;

class Router
{
    protected $routes = [];

    private function add(string $uri, string $method, string $controller, $middleware = null)
    {
        $this->routes[] = compact("uri", "method", "controller", "middleware");
        // $this->routes[] = [
        //     'uri' => $uri,
        //     'method' => $method,
        //     'controller' => $controller,
        // ];

        return $this;
    }

    public function get(string $uri, string $controller)
    {
        return $this->add($uri, "GET", $controller);
    }

    public function post(string $uri, string $controller)
    {
        return $this->add($uri, "POST", $controller);
    }

    public function patch(string $uri, string $controller)
    {
        return $this->add($uri, "PATCH", $controller);
    }

    public function put(string $uri, string $controller)
    {
        return $this->add($uri, "PUT", $controller);
    }

    public function delete(string $uri, string $controller)
    {
        return $this->add($uri, "DELETE", $controller);
    }

    public function only(string $middleware_name)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $middleware_name;

        return $this;
    }

    function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                Middleware::resolve($route["middleware"]);

                return require base_path($route["controller"]);
            }
        }

        abort(404);
    }
}

// $routes = require(base_path("routes.php"));

// if ($req_method == 'GET') {
//   routeToController($path, $routes);
// }

// function routeToController($path, $routes)
// {
//   if (array_key_exists($path, $routes)) {
//     require base_path($routes[$path]);
//   } else {
//     abort(404);
//   }
// }

// if ($req_method == 'POST') {
//   // TODO
// }
