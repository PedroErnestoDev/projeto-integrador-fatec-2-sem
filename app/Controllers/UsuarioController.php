<?php

require_once __DIR__ . "/../Models/Usuario.php";
require_once __DIR__ . "/../Core/Auth.php";
require_once __DIR__ . "/../Core/Perfil.php";

class UsuarioController
{
    private Usuario $usuario;

    public function __construct(PDO $pdo)
    {
        $this->usuario = new Usuario($pdo);
    }

    public function login(): void
    {
        Auth::iniciarSessao();

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

        session_regenerate_id(true);

        $perfil = (int) $usuario['fk_perfil'];

        $_SESSION['id_usuario'] = (int) $usuario['id_usuario'];
        $_SESSION['login_usuario'] = $usuario['login_usuario'];
        $_SESSION['fk_perfil'] = $perfil;

        if (
            $perfil === Perfil::ADMIN ||
            $perfil === Perfil::SUPERVISOR
        ) {
            header('Location: /dashboard');
            exit;
        }

        if ($perfil === Perfil::FUNCIONARIO) {
            header('Location: /ocorrencias/criar');
            exit;
        }

        Auth::deslogar();
    }

    public function listarParaPagina(): void
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        $usuarios = $this->usuario->listar();

        require_once __DIR__ . "/../Views/dashboard/usuarios/index.php";
    }

    public function criar(): void
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dashboard/usuarios');
            exit;
        }

        $nome = trim($_POST['nome_usuario'] ?? '');
        $login = trim($_POST['login_usuario'] ?? '');
        $senha = $_POST['senha_usuario'] ?? '';
        $perfil = (int) ($_POST['perfil'] ?? 0);

        if (
            $nome === '' ||
            $login === '' ||
            $senha === '' ||
            $perfil <= 0
        ) {
            $_SESSION['erro_usuario'] = 'Preencha todos os campos.';

            header('Location: /dashboard/usuarios');
            exit;
        }

        try {

            $resultado = $this->usuario->criar(
                $nome,
                $login,
                $senha,
                $perfil
            );

            if (!$resultado) {
                $_SESSION['erro_usuario'] = 'Erro ao cadastrar usuário.';
            } else {
                $_SESSION['sucesso_usuario'] = 'Usuário cadastrado com sucesso.';
            }

        } catch (PDOException $e) {

            error_log($e->getMessage());

            if ($e->getCode() === '23000') {
                $_SESSION['erro_usuario'] = 'Este login já está em uso.';
            } else {
                $_SESSION['erro_usuario'] = 'Erro ao cadastrar usuário.';
            }
        }

        header('Location: /dashboard/usuarios');
        exit;
    }

    public function atualizar(): void
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dashboard/usuarios');
            exit;
        }

        $idUsuario = (int) ($_POST['id_usuario'] ?? 0);
        $nome = trim($_POST['nome_usuario'] ?? '');
        $login = trim($_POST['login_usuario'] ?? '');
        $senha = $_POST['senha_usuario'] ?? '';
        $perfil = (int) ($_POST['perfil'] ?? 0);

        if (
            $idUsuario <= 0 ||
            $nome === '' ||
            $login === '' ||
            $perfil <= 0
        ) {
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
            } else {
                $_SESSION['sucesso_usuario'] = 'Usuário atualizado com sucesso.';
            }

        } catch (PDOException $e) {

            error_log($e->getMessage());

            if ($e->getCode() === '23000') {
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
        $idUsuarioLogado = Auth::usuario();

        if ($idUsuario <= 0) {
            $_SESSION['erro_usuario'] = 'Usuário inválido.';
            header('Location: /dashboard/usuarios');
            exit;
        }

        try {
            $resultado = $this->usuario->excluir($idUsuario);

            if (!$resultado) {
                $_SESSION['erro_usuario'] = 'Usuário não encontrado ou já excluído.';
                header('Location: /dashboard/usuarios');
                exit;
            }

            // Se o admin excluiu a própria conta
            if ($idUsuario === $idUsuarioLogado) {
                Auth::deslogar();
                return;
            }

            $_SESSION['sucesso_usuario'] = 'Usuário excluído com sucesso.';

        } catch (PDOException $e) {
            error_log('Erro ao excluir usuário: ' . $e->getMessage());
            $_SESSION['erro_usuario'] = 'Erro interno ao excluir usuário.';
        }

        header('Location: /dashboard/usuarios');
        exit;
    }
}