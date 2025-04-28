<?php

    class Router {
        private $routes = [];

        public function add($method, $path, $callback) {
            $this->routes[] = compact('method', 'path', 'callback');
        }

        public function dispatch($method, $path) {
            foreach ($this->routes as $route) {
                if ($route['method'] === $method && $route['path'] === $path) {
                    return call_user_func($route['callback']);
                }
            }

            http_response_code(404);
            echo json_encode(['error' => 'Rota não encontrada']);
        }
    }
?>