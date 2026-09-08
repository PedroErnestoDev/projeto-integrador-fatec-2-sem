<?php
    class Usuario {
        private PDO $pdo;

        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        public function login(string $login, string $senha): ?array{
            $sql = "SELECT u.id_usuario ,u.login_usuario, u.senha_usuario, u.fk_perfil FROM usuario u WHERE u.login_usuario = :login AND u.ativo = 1 LIMIT 1";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':login' => $login
            ]);

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$usuario) {
                return null;
            }

            if(!password_verify($senha, $usuario['senha_usuario'])){
                return null;
            }

            unset($usuario['senha_usuario']);

            return $usuario;
        }

        public function listar(): array{
            $sql =  $sql = "SELECT 
                u.id_usuario,
                u.nome_usuario,
                u.login_usuario,
                u.senha_usuario,
                u.fk_perfil,
                p.nome_perfil AS perfil
            FROM usuario u
            INNER JOIN perfil p
                ON p.id_perfil = u.fk_perfil
            ORDER BY u.id_usuario ASC";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function criar(
            string $nome_usuario,
            string $login_usuario,
            string $senha_usuario,
            int $perfil
        ): array{

            $senhaHash = password_hash($senha_usuario, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (nome_usuario, login_usuario, senha_usuario, fk_perfil, ativo) VALUES (:nome_usuario, :login_usuario, :senha_usuario, :perfil, 1)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':nome_usuario'  => $nome_usuario,
                ':login_usuario' => $login_usuario,
                ':senha_usuario' => $senhaHash,
                ':perfil'        => $perfil
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function atualizar(
            int $id,
            string $nome_usuario,
            string $login_usuario,
            string $senha_usuario,
            int $perfil
        ) : bool {

            $senhaHash = password_hash($senha_usuario, PASSWORD_DEFAULT);

            $sql = "UPDATE usuario SET nome_usuario = :nome_usuario, login_usuario = :login_usuario, senha_usuario = :senhaHash, fk_perfil = :perfil WHERE id_usuario = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':nome_usuario'  => $nome_usuario,
                ':login_usuario' => $login_usuario,
                ':senhaHash' => $senhaHash,
                ':perfil'        => $perfil,
                ':id' => $id
            ]);
        }

        public function excluir(
            int $id
        ): bool{
            $sql = "DELETE FROM usuario WHERE id_usuario = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id
            ]);
        }
    }
?>