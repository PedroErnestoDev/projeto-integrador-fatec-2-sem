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
    }
?>