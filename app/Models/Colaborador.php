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

        public function criar(
            string $nome_colaborador
        ): bool {
            $sql = "INSERT INTO colaborador (nome_colaborador, fk_setor, ativo) VALUES (:nome_colaborador, 3, 1)";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':nome_colaborador' => $nome_colaborador
            ]);
        }

        public function editar(
            int $id,
            string $nome_colaborador
        ): bool{
            $sql = "UPDATE colaborador SET nome_colaborador = :nome_colaborador WHERE id_colaborador = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id,
                ':nome_colaborador' => $nome_colaborador
            ]);
        }

        public function excluir(
            int $id
        ): bool{
            $sql = "DELETE FROM colaborador WHERE id_colaborador = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id
            ]);
        }
    }
?>