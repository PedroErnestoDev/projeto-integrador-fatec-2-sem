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

    public static function exigirPerfil(int ...$perfis): void
    {
        self::exigirLogin();

        $perfilUsuario = self::perfil();

        if (
            $perfilUsuario === null ||
            !in_array($perfilUsuario, $perfis, true)
        ) {
            http_response_code(403);
            echo "Acesso negado.";
            exit;
        }
    }
}