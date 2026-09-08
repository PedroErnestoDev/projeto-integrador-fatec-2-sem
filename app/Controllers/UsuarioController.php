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

            if($usuario['fk_perfil'] === Perfil::ADMIN || $usuario['fk_perfil'] === Perfil::SUPERVISOR){
                header('Location: /dashboard');
                exit;
            }

            if($usuario['fk_perfil'] === Perfil::FUNCIONARIO ){
                header('Location: /ocorrencias/criar');
                exit;
            }
        }

        public function listarParaPagina(): void{
            Auth::exigirPerfil(Perfil::ADMIN);

            $usuarios = $this->usuario->listar();

            require_once __DIR__ . "/../Views/dashboard/usuarios/index.php";
        }

        public function criar(): void{
            Auth::exigirPerfil(Perfil::ADMIN);
            

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /dashboard/usuarios');
                exit;
            }

            $nome   = trim($_POST['nome_usuario']  ?? '');
            $login  = trim($_POST['login_usuario'] ?? '');
            $senha  = $_POST['senha_usuario']      ?? '';
            $perfil = (int) ($_POST['perfil']      ?? 0);

            // Validação básica
            if ($nome === '' || $login === '' || $senha === '' || $perfil <= 0) {
                $_SESSION['erro_usuario'] = 'Preencha todos os campos.';
                header('Location: /dashboard/usuarios');
                exit;
            }

            try {
                $resultado = $this->usuario->criar(
                    $nome,
                    $login,
                    $senha,      // senha em texto puro
                    $perfil
                );

                if (!$resultado) {
                    $_SESSION['erro_usuario'] = 'Erro ao cadastrar usuário.';
                    header('Location: /dashboard/usuarios');
                    exit;
                }

                $_SESSION['sucesso_usuario'] = 'Usuário cadastrado com sucesso.';
                header('Location: /dashboard/usuarios');
                exit;

            } catch (PDOException $e) {
                // Trata login duplicado (código 23000 no MySQL)
                if ($e->getCode() == 23000) {
                    $_SESSION['erro_usuario'] = 'Este login já está em uso.';
                } else {
                    $_SESSION['erro_usuario'] = 'Erro ao cadastrar usuário.';
                }

                header('Location: /dashboard/usuarios');
                exit;
            }
        }

        public function atualizar(): void{
            Auth::exigirPerfil(Perfil::ADMIN);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /dashboard/usuarios');
                exit;
            }

            $idUsuario = (int) ($_POST['id_usuario'] ?? 0);
            $nome      = trim($_POST['nome_usuario'] ?? '');
            $login     = trim($_POST['login_usuario'] ?? '');
            $senha     = $_POST['senha_usuario'] ?? '';
            $perfil    = (int) ($_POST['perfil'] ?? 0);

            if ($idUsuario <= 0 || $nome === '' || $login === '' || $perfil <= 0) {
                $_SESSION['erro_usuario'] = 'Preencha todos os campos obrigatórios.';
                header('Location: /dashboard/usuarios');
                exit;
            }

            try {

                $resultado = $this->usuario->atualizar(
                    $idUsuario,
                    $nome,
                    $login,
                    $senha,
                    $perfil
                );

                if (!$resultado) {
                    $_SESSION['erro_usuario'] = 'Erro ao atualizar usuário.';
                    header('Location: /dashboard/usuarios');
                    exit;
                }

                $_SESSION['sucesso_usuario'] = 'Usuário atualizado com sucesso.';

            } catch (PDOException $e) {

                if ($e->getCode() == 23000) {
                    $_SESSION['erro_usuario'] = 'Este login já está em uso.';
                } else {
                    $_SESSION['erro_usuario'] = 'Erro ao atualizar usuário.';
                }
            }

            header('Location: /dashboard/usuarios');
            exit;
        }

        public function excluir(): void
        {
            Auth::exigirPerfil(Perfil::ADMIN);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /dashboard/usuarios');
                exit;
            }

            $idUsuario = (int) ($_POST['id_usuario'] ?? 0);

            if ($idUsuario <= 0) {
                $_SESSION['erro_usuario'] = 'Usuário inválido.';
                header('Location: /dashboard/usuarios');
                exit;
            }

            try {

                $resultado = $this->usuario->excluir($idUsuario);

                if (!$resultado) {
                    $_SESSION['erro_usuario'] = 'Erro ao excluir usuário.';
                    header('Location: /dashboard/usuarios');
                    exit;
                }

                $_SESSION['sucesso_usuario'] = 'Usuário excluído com sucesso.';

            } catch (PDOException $e) {

                if ($e->getCode() == 23000) {
                    $_SESSION['erro_usuario'] = 'Não é possível excluir este usuário porque ele possui registros relacionados.';
                } else {
                    $_SESSION['erro_usuario'] = 'Erro ao excluir usuário.';
                }
            }

            header('Location: /dashboard/usuarios');
            exit;
        }
    }
?>