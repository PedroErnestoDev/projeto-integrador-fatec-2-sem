<?php

class Setor{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listar() : array {
        $sql = "SELECT id_setor, nome_setor FROM setor";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar(
        string $nome_setor
    ) : bool {
        $sql = "INSERT INTO setor (nome_setor) VALUES (:nome_setor)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome_setor' => $nome_setor
        ]);
    }

    public function atualizar(
        int $id,
        string $nome_setor
    ) : bool {
        $sql = "UPDATE setor SET nome_setor = :nome_setor WHERE id_setor = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome_setor' => $nome_setor
        ]);
    }

    public function deletar(
        int $id
    ) : bool {
        $sql = "DELETE FROM setor WHERE id_setor = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}