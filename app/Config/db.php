<?php

class DB
{
    private string $host = "db";
    private int $port = 3306;
    private string $database = "playpark";
    private string $username = "admin";
    private string $password;

    public function __construct()
    {
        $this->password = "8Z5tHHEF2F4TvEgrxdG1Dx0OK";
    }

    public function conectar(): PDO
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";

            $pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            // Fuso horário de Brasília (UTC-3)
            $pdo->exec("SET time_zone = '-03:00'");

            $usuarioLogado = null;

            if (session_status() === PHP_SESSION_ACTIVE) {
                $usuarioLogado = $_SESSION['id_usuario'] ?? null;
            }

            if ($usuarioLogado !== null) {
                $pdo->exec("SET @usuario_logado = " . (int) $usuarioLogado);
            } else {
                $pdo->exec("SET @usuario_logado = NULL");
            }

            return $pdo;

        } catch (PDOException $e) {
            error_log("Erro na conexão com o banco: " . $e->getMessage());
            throw $e;
        }
    }
}