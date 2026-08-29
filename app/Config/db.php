<?php 
    class DB {
    private string $host = "db";
    private int $port = 3306;
    private string $database = "playpark";
    private string $username = "admin";
    private string $password = "8Z5tHHEF2F4TvEgrxdG1Dx0OK";
    

    public function conectar(): PDO {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";

            $pdo = new PDO(
                $dsn,
                $this->username,
                $this->password
            );

            return $pdo;

        } catch (PODException $e){
            echo "Erro ao realizar conexão" . $e->getMessage();

            exit;
        }
    }
    }
?>