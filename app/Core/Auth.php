<?php

class Auth
{
    public static function iniciarSessao(): void
    {
        if (session_status() === PHP_SESSION_DISABLED) {
            throw new RuntimeException('Sessões PHP estão desabilitadas.');
        }

        if (session_status() === PHP_SESSION_NONE) {
            if (headers_sent($arquivo, $linha)) {
                throw new RuntimeException(
                    "Não foi possível iniciar a sessão. Saída iniciada em {$arquivo}:{$linha}"
                );
            }

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

        return isset($_SESSION['id_usuario'])
            ? (int) $_SESSION['id_usuario']
            : null;
    }

    public static function perfil(): ?int
    {
        self::iniciarSessao();

        return isset($_SESSION['fk_perfil'])
            ? (int) $_SESSION['fk_perfil']
            : null;
    }

    public static function nome(): ?string
    {
        self::iniciarSessao();

        return $_SESSION['nome'] ?? null;
    }

    public static function exigirLogin(): void
    {
        if (!self::autenticado()) {
            header('Location: /login');
            exit;
        }
    }

    public static function exigirPerfil(int ...$perfis): void
    {
        self::exigirLogin();

        if (!in_array(self::perfil(), $perfis, true)) {
            http_response_code(403);

            exit('Acesso negado. Você não possui permissão para acessar esta funcionalidade.');
        }
    }

    public static function deslogar(): void
    {
        self::iniciarSessao();

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                [
                    'expires' => time() - 42000,
                    'path' => $params['path'],
                    'domain' => $params['domain'],
                    'secure' => $params['secure'],
                    'httponly' => $params['httponly'],
                    'samesite' => $params['samesite'] ?? 'Lax'
                ]
            );
        }

        session_destroy();

        header('Location: /login');
        exit;
    }
}
