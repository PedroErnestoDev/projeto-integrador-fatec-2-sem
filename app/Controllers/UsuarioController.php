<?php
    require_once __DIR__ . "/../Config/db.php";
    require_once __DIR__ . "/../Models/Usuario.php";
    require_once __DIR__ . "/../Core/Perfil.php";

    class UsuarioController{
        private Usuario $usuario;

        public function __construct(PDO $pdo) {
            $this->usuario = new Usuario($pdo);
        }

        public function login(): void{
             if (session_status() === PHP_SESSION_NONE) {
            session_start();
            }

            $login = trim($_POST['login_usuario'] ?? '');
            $senha = $_POST['senha_usuario'] ?? '';

            if ($login === '' || $senha === '') {

                $_SESSION['erro_login'] = 'Preencha login e senha.';

                header('Location: /login');
                exit;
            }

            $usuario = $this->usuario->login($login, $senha);

            if (!$usuario) {

                $_SESSION['erro_login'] = 'Login ou senha inválidos.';

                header('Location: /login');
                exit;
            }

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['login_usuario'] = $usuario['login_usuario'];
            $_SESSION['fk_perfil'] = $usuario['fk_perfil'];

            if($usuario['fk_perfil'] === Perfil::ADMIN ){
                header('Location: /dashboard');
                exit;
            }

            if($usuario['fk_perfil'] === Perfil::FUNCIONARIO ){
                header('Location: /ocorrencias/criar');
                exit;
            }
        }
    }
?>