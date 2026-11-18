<?php

class Usuario
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login(string $login, string $senha): ?array
    {
        $sql = "
            SELECT
                id_usuario,
                login_usuario,
                senha_usuario,
                fk_perfil
            FROM usuario
            WHERE login_usuario = :login
              AND ativo = 1
            LIMIT 1
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':login' => $login
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return null;
        }

        if (!password_verify($senha, $usuario['senha_usuario'])) {
            return null;
        }

        unset($usuario['senha_usuario']);

        $usuario['id_usuario'] = (int) $usuario['id_usuario'];
        $usuario['fk_perfil'] = (int) $usuario['fk_perfil'];

        return $usuario;
    }

    public function listar(): array
    {
        $sql = "
            SELECT
                u.id_usuario,
                u.nome_usuario,
                u.login_usuario,
                u.fk_perfil,
                p.nome_perfil AS perfil
            FROM usuario u
            INNER JOIN perfil p
                ON p.id_perfil = u.fk_perfil
            ORDER BY u.id_usuario ASC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar(
        string $nome_usuario,
        string $login_usuario,
        string $senha_usuario,
        int $perfil
    ): bool {

        $senhaHash = password_hash(
            $senha_usuario,
            PASSWORD_DEFAULT
        );

        $sql = "
            INSERT INTO usuario (
                nome_usuario,
                login_usuario,
                senha_usuario,
                fk_perfil,
                ativo
            )
            VALUES (
                :nome_usuario,
                :login_usuario,
                :senha_usuario,
                :perfil,
                1
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome_usuario'  => $nome_usuario,
            ':login_usuario' => $login_usuario,
            ':senha_usuario' => $senhaHash,
            ':perfil'        => $perfil
        ]);
    }

    public function atualizar(
        int $id,
        string $nome_usuario,
        string $login_usuario,
        string $senha_usuario,
        int $perfil
    ): bool {

        if ($senha_usuario !== '') {

            $senhaHash = password_hash(
                $senha_usuario,
                PASSWORD_DEFAULT
            );

            $sql = "
                UPDATE usuario
                SET
                    nome_usuario = :nome_usuario,
                    login_usuario = :login_usuario,
                    senha_usuario = :senha,
                    fk_perfil = :perfil
                WHERE id_usuario = :id
            ";

            $parametros = [
                ':nome_usuario' => $nome_usuario,
                ':login_usuario' => $login_usuario,
                ':senha' => $senhaHash,
                ':perfil' => $perfil,
                ':id' => $id
            ];

        } else {

            $sql = "
                UPDATE usuario
                SET
                    nome_usuario = :nome_usuario,
                    login_usuario = :login_usuario,
                    fk_perfil = :perfil
                WHERE id_usuario = :id
            ";

            $parametros = [
                ':nome_usuario' => $nome_usuario,
                ':login_usuario' => $login_usuario,
                ':perfil' => $perfil,
                ':id' => $id
            ];
        }

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($parametros);
    }

   public function excluir(int $id): bool
    {
        try {
            $this->pdo->beginTransaction();

            // 1. Apaga o histórico de alterações feito por esse usuário
            $stmt = $this->pdo->prepare("
                DELETE FROM historico_ocorrencia
                WHERE usuario = :id
            ");
            $stmt->execute([':id' => $id]);

            // 2. Apaga as ocorrências criadas por esse usuário
            $stmt = $this->pdo->prepare("
                DELETE FROM ocorrencia
                WHERE fk_usuario = :id
            ");
            $stmt->execute([':id' => $id]);

            // 3. Agora sim apaga o usuário
            $stmt = $this->pdo->prepare("
                DELETE FROM usuario
                WHERE id_usuario = :id
            ");
            $stmt->execute([':id' => $id]);

            $apagou = $stmt->rowCount() > 0;

            $this->pdo->commit();

            return $apagou;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e; // deixa o controller tratar
        }
    }
}
