<?php

class Router
{
    private array $routes = [];

    public function get(string $path, callable $action): void
    {
        $this->routes['GET'][] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public function post(string $path, callable $action): void
    {
        $this->routes['POST'][] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public function delete(string $path, callable $action): void
    {
        $this->routes['DELETE'][] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $path = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        foreach ($this->routes[$method] ?? [] as $route) {

            $routePath = $route['path'];

            $pattern = preg_replace(
                '/\{[^}]+\}/',
                '([^/]+)',
                $routePath
            );

            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $path, $matches)) {

                // Remove o caminho completo encontrado
                array_shift($matches);

                // Executa a action passando os parâmetros
                call_user_func(
                    $route['action'],
                    ...$matches
                );

                return;
            }
        }

        http_response_code(404);

        echo "Página não encontrada.";
    }
}