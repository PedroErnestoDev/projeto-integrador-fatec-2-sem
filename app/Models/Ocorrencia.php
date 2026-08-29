<?php
    class Ocorrencia{
        private PDO $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function criar(
            int $fkColaborador,
            int $fkBrinquedo,
            string $ordemProducao,
            string $descricao,
            int $fkPrioridade,
            int $fkUsuario,
        ): bool {
            $sql = "INSERT INTO ocorrencia (fk_colaborador, fk_brinquedo, ordem_producao, descricao_ocorrencia, fk_prioridade, fk_status, fk_usuario) 
                VALUES (:fk_colaborador, :fk_brinquedo, :ordem_producao, :descricao_ocorrencia, :fk_prioridade, 1, :fk_usuario)
            ";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':fk_colaborador' => $fkColaborador,
                ':fk_brinquedo' => $fkBrinquedo,
                ':ordem_producao' => $ordemProducao,
                ':descricao_ocorrencia' => $descricao,
                ':fk_prioridade' => $fkPrioridade,
                ':fk_usuario' => $fkUsuario
            ]);
        }
    }
?>