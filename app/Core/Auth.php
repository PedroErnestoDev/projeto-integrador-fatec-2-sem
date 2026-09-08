<?php

class Auth{
    public static function iniciarSessao(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function autenticado(): bool
    {
        self::iniciarSessao();

        return isset($_SESSION['id_usuario']);
    }

    public static function usuario(): ?int
    {
        self::iniciarSessao();

        if (!isset($_SESSION['id_usuario'])) {
            return null;
        }

        return (int) $_SESSION['id_usuario'];
    }

    public static function perfil(): ?int
    {
        self::iniciarSessao();

        if (!isset($_SESSION['fk_perfil'])) {
            return null;
        }

        return (int) $_SESSION['fk_perfil'];
    }

    public static function exigirLogin(): void
    {
        if (!self::autenticado()) {
            header('Location: /login');
            exit;
        }
    }

    public static function deslogar(): void
    {
        self::iniciarSessao();

        // Remove todas as variáveis da sessão
        $_SESSION = [];

        // Destrói a sessão
        session_destroy();

        // Redireciona para o login
        header('Location: /login');
        exit;
    }

    public static function nome(): ?string
    {
        self::iniciarSessao();

        return $_SESSION['nome'] ?? null;
    }

    public static function exigirPerfil(int ...$perfis): void
    {
        self::exigirLogin();

        $perfilUsuario = self::perfil();

        if (
            $perfilUsuario === null ||
            !in_array($perfilUsuario, $perfis, true)
        ) {
            http_response_code(403);
            echo <<<HTML
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Acesso Negado | Play Park</title>

                <link
                    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
                    rel="stylesheet"
                >

                <link
                    rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
                >
            </head>

            <body class="bg-light">

                <main class="container min-vh-100 d-flex align-items-center justify-content-center">

                    <div class="card border-0 shadow-sm text-center"
                        style="max-width: 500px; width: 100%;">

                        <div class="card-body p-5">

                            <!-- Ícone -->
                            <div class="mb-4">
                                <div
                                    class="d-inline-flex align-items-center justify-content-center
                                        rounded-circle bg-danger bg-opacity-10"
                                    style="width: 80px; height: 80px;"
                                >
                                    <i class="bi bi-shield-lock-fill text-danger fs-1"></i>
                                </div>
                            </div>

                            <!-- Título -->
                            <h2 class="fw-bold text-dark mb-3">
                                Acesso Negado
                            </h2>

                            <!-- Mensagem -->
                            <p class="text-secondary mb-2">
                                Você não possui permissão para acessar esta funcionalidade.
                            </p>

                            <p class="text-secondary small mb-4">
                                Somente usuários com perfil de
                                <strong>Administrador</strong>
                                podem acessar este recurso.
                            </p>

                            <!-- Botão voltar -->
                            <button
                                type="button"
                                class="btn btn-primary px-4"
                                onclick="history.back()"
                            >
                                <i class="bi bi-arrow-left me-2"></i>
                                Voltar
                            </button>

                        </div>

                    </div>

                </main>

            </body>
            </html>
            HTML;
            exit;
        }
    }
}