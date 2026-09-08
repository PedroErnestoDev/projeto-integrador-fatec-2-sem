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

        public function criar(
            string $nome_brinquedo
        ): bool {
            $sql = "INSERT INTO brinquedo (nome_brinquedo, codigo_brinquedo, brinquedo_ativo) VALUES (:nome_brinquedo, 1, 1)";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':nome_brinquedo' => $nome_brinquedo
            ]);
        }


        public function editar(
            int $id,
            string $nome_brinquedo
        ): bool{
            $sql = "UPDATE brinquedo SET nome_brinquedo = :nome_brinquedo WHERE id_brinquedo = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id,
                ':nome_brinquedo' => $nome_brinquedo
            ]);
        }

        public function excluir(
            int $id
        ): bool{
            $sql = "DELETE FROM brinquedo WHERE id_brinquedo = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id
            ]);
        }
    }
?>