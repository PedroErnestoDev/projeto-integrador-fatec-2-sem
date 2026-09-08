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

        echo '<!DOCTYPE html> <html lang="pt-BR"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Página não encontrada | Play Park</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <style> body { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #f8f9fa; font-family: Arial, sans-serif; } .error-container { max-width: 600px; text-align: center; padding: 40px; } .error-code { font-size: 120px; font-weight: 700; line-height: 1; color: #212529; } .error-title { margin-top: 20px; font-size: 32px; font-weight: 600; } .error-message { margin-top: 15px; color: #6c757d; font-size: 17px; } .error-actions { margin-top: 30px; display: flex; justify-content: center; gap: 10px; } </style> </head> <body> <main class="error-container"> <div class="error-code">404</div> <h1 class="error-title"> Página não encontrada </h1> <p class="error-message"> A página que você está tentando acessar não existe ou não está disponível. </p> <div class="error-actions"> <button type="button" class="btn btn-secondary" onclick="history.back()"> Voltar </button> <a href="/dashboard" class="btn btn-primary"> Ir para o Dashboard </a> </div> </main> </body> </html> ';
    }
}