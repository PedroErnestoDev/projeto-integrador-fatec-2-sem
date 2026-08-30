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

        public function listarCincoRecentes(): array{
            $sql = "SELECT o.id_ocorrencia, o.criado_em, c.nome_colaborador AS colaborador, b.nome_brinquedo AS brinquedo, p.nome_prioridade AS prioridade, s.nome_status AS status
            FROM ocorrencia o

            INNER JOIN colaborador c
                ON c.id_colaborador = o.fk_colaborador

            INNER JOIN brinquedo b
                ON b.id_brinquedo = o.fk_brinquedo

            INNER JOIN prioridade p
                ON p.id_prioridade = o.fk_prioridade

            INNER JOIN status s
                ON s.id_status = o.fk_status

            ORDER BY
                o.criado_em DESC,
                o.id_ocorrencia DESC

            LIMIT 5";

             $stmt = $this->pdo->prepare($sql);

             $stmt->execute();

             return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function contarPorStatus(): array {
            $sql = "SELECT
            COUNT(*) AS total,

            SUM(
                CASE
                    WHEN fk_status = 1 THEN 1
                    ELSE 0
                END
            ) AS abertas,

            SUM(
                CASE
                    WHEN fk_status = 2 THEN 1
                    ELSE 0
                END
            ) AS andamento,

            SUM(
                CASE
                    WHEN fk_status = 3 THEN 1
                    ELSE 0
                END
            ) AS concluidas

            FROM ocorrencia";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function contarPorPrioridade(): array {
            $sql = "SELECT
            SUM(
                CASE
                    WHEN fk_prioridade = 1 THEN 1
                    ELSE 0
                END
            ) AS baixa,

            SUM(
                CASE
                    WHEN fk_prioridade = 2 THEN 1
                    ELSE 0
                END
            ) AS media,

            SUM(
                CASE
                    WHEN fk_prioridade = 3 THEN 1
                    ELSE 0
                END
            ) AS alta

            FROM ocorrencia";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function listarTopCincoBrinquedos(): array {
                $sql = "
                    SELECT
                        b.nome_brinquedo AS brinquedo,
                        COUNT(o.id_ocorrencia) AS total
                    FROM ocorrencia o

                    INNER JOIN brinquedo b
                        ON b.id_brinquedo = o.fk_brinquedo

                    GROUP BY
                        b.id_brinquedo,
                        b.nome_brinquedo

                    ORDER BY
                        total DESC

                    LIMIT 5
                ";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function listarTodas(): array {
                $sql = "SELECT
                        o.id_ocorrencia,
                        o.ordem_producao,
                        o.descricao_ocorrencia,
                        o.solucao_ocorrencia,
                        o.data_abertura,
                        o.data_atualizacao,
                        o.data_conclusao,

                        o.fk_colaborador,
                        c.nome_colaborador AS colaborador,

                        o.fk_brinquedo,
                        b.nome_brinquedo AS brinquedo,

                        o.fk_prioridade,
                        p.nome_prioridade AS prioridade,

                        o.fk_status,
                        s.nome_status AS status,

                        o.fk_usuario,
                        u.login_usuario AS usuario,

                        o.criado_em,
                        o.atualizado_em

                    FROM ocorrencia o

                    INNER JOIN colaborador c
                        ON c.id_colaborador = o.fk_colaborador

                    INNER JOIN brinquedo b
                        ON b.id_brinquedo = o.fk_brinquedo

                    INNER JOIN prioridade p
                        ON p.id_prioridade = o.fk_prioridade

                    INNER JOIN status s
                        ON s.id_status = o.fk_status

                    INNER JOIN usuario u
                        ON u.id_usuario = o.fk_usuario

                    ORDER BY
                        o.criado_em DESC,
                        o.id_ocorrencia DESC
                ";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            public function buscarPorId(int $id): ?array{
                $sql = "SELECT
                            o.id_ocorrencia,
                            o.ordem_producao,
                            o.descricao_ocorrencia,
                            o.solucao_ocorrencia,

                            o.data_abertura,
                            o.data_atualizacao,
                            o.data_conclusao,

                            o.fk_colaborador,
                            c.nome_colaborador AS colaborador,

                            o.fk_brinquedo,
                            b.nome_brinquedo AS brinquedo,

                            o.fk_prioridade,
                            p.nome_prioridade AS prioridade,

                            o.fk_status,
                            s.nome_status AS status,

                            o.fk_usuario,
                            u.login_usuario AS usuario,

                            o.criado_em,
                            o.atualizado_em

                        FROM ocorrencia o

                        INNER JOIN colaborador c
                            ON c.id_colaborador = o.fk_colaborador

                        INNER JOIN brinquedo b
                            ON b.id_brinquedo = o.fk_brinquedo

                        INNER JOIN prioridade p
                            ON p.id_prioridade = o.fk_prioridade

                        INNER JOIN status s
                            ON s.id_status = o.fk_status

                        INNER JOIN usuario u
                            ON u.id_usuario = o.fk_usuario

                        WHERE o.id_ocorrencia = :id

                        LIMIT 1
                    ";

                    $stmt = $this->pdo->prepare($sql);

                    $stmt->execute([
                        ':id' => $id
                    ]);

                    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                    return $resultado ?: null;
                }

                public function atualizar(
                    int $id,
                    int $colaborador,
                    int $brinquedo,
                    string $ordemProducao,
                    string $descricao,
                    ?string $solucao,
                    int $prioridade,
                    int $status
                ): bool {

                    $sql = "
                        UPDATE ocorrencia
                        SET
                            fk_colaborador = :colaborador,
                            fk_brinquedo = :brinquedo,
                            ordem_producao = :ordem_producao,
                            descricao_ocorrencia = :descricao,
                            solucao_ocorrencia = :solucao,
                            fk_prioridade = :prioridade,
                            fk_status = :status,
                            data_atualizacao = NOW(),
                            atualizado_em = NOW()

                        WHERE id_ocorrencia = :id
                    ";

                    $stmt = $this->pdo->prepare($sql);

                    $stmt->bindValue(
                        ':id',
                        $id,
                        PDO::PARAM_INT
                    );

                    $stmt->bindValue(
                        ':colaborador',
                        $colaborador,
                        PDO::PARAM_INT
                    );

                    $stmt->bindValue(
                        ':brinquedo',
                        $brinquedo,
                        PDO::PARAM_INT
                    );

                    $stmt->bindValue(
                        ':ordem_producao',
                        $ordemProducao,
                        PDO::PARAM_STR
                    );

                    $stmt->bindValue(
                        ':descricao',
                        $descricao,
                        PDO::PARAM_STR
                    );

                    $stmt->bindValue(
                        ':solucao',
                        $solucao,
                        $solucao === null
                            ? PDO::PARAM_NULL
                            : PDO::PARAM_STR
                    );

                    $stmt->bindValue(
                        ':prioridade',
                        $prioridade,
                        PDO::PARAM_INT
                    );

                    $stmt->bindValue(
                        ':status',
                        $status,
                        PDO::PARAM_INT
                    );

                    return $stmt->execute();
                }

                public function deletar(int $id): bool
                {
                    $sql = "
                        DELETE FROM ocorrencia
                        WHERE id_ocorrencia = :id
                    ";

                    $stmt = $this->pdo->prepare($sql);

                    return $stmt->execute([
                        ':id' => $id
                    ]);
                }
    }
?>