<?php
    require_once __DIR__ . "/../Config/db.php";
    require_once __DIR__ . "/../Models/Usuario.php";

    class UsuarioController{
        private Usuario $usuario;

        public function __construct(PDO $pdo) {
            $this->usuario = new Usuario($pdo);
        }

        public function login(): void{
            $login = trim($_POST['login_usuario'] ?? '');
            $senha = $_POST['senha_usuario'] ?? '';

            if($login === '' || $senha === ''){
                echo "Preencha login e senha";
                return;
            }

            $usuario = $this->usuario->login($login, $senha);

            if(!$usuario){
                echo "Login ou senha inválidos";
                return;
            }

            session_start();

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['login_usuario'] = $usuario['login_usuario'];
            $_SESSION['fk_perfil'] = $usuario['fk_perfil'];

            if($usuario['fk_perfil'] == 1){
                header('Location: /dashboard');
                exit;
            }

            header('Location: /ocorrencias/criar');
            exit;
        }
    }
?>