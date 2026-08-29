<?php
    class Brinquedo{
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function listar(): ?array{
            $sql = "SELECT id_brinquedo, nome_brinquedo FROM brinquedo ORDER BY nome_brinquedo ASC";

            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>