<?php
    class Colaborador{
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function listar(): ?array{
            $sql = "SELECT id_colaborador, nome_colaborador FROM colaborador ORDER BY nome_colaborador ASC";

            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>