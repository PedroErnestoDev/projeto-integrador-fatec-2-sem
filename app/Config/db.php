<?php

class DB
{
    private string $host = "db";
    private int $port = 3306;
    private string $database = "playpark";
    private string $username = "admin";
    private string $password = "8Z5tHHEF2F4TvEgrxdG1Dx0OK";

    public function conectar(): PDO
    {
        try {

            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";

            $pdo = new PDO(
                $dsn,
                $this->username,
                $this->password
            );

            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            // Garante que a sessão esteja disponível
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Pega o usuário atualmente logado
            $usuarioLogado = $_SESSION['id_usuario'] ?? null;

            if ($usuarioLogado !== null) {

                $pdo->exec(
                    "SET @usuario_logado = " . (int) $usuarioLogado
                );

            } else {

                $pdo->exec(
                    "SET @usuario_logado = NULL"
                );
            }

            return $pdo;

        } catch (PDOException $e) {

            echo "Erro ao realizar conexão: " . $e->getMessage();

            exit;
        }
    }
}
?>