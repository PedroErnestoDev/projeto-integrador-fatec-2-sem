<?php

    require_once __DIR__ . "/../Models/Colaborador.php";

    class ColaboradorController{
        private Colaborador $colaborador;

        public function __construct(PDO $pdo) {
            $this->colaborador = new Colaborador($pdo);
        }

        public function listar():void {
            header('Content-type: application/json; charset=utf-8');

            try {
                $colaboradores = $this->colaborador->listar();

                http_response_code(200);

                echo json_encode($colaboradores);
            } catch (PDOException $e) {

                http_response_code(500);

                echo json_encode([
                    'sucesso' => false,
                    'mensagem' => 'Erro ao buscar colaboradores'
                ]);
            }
        }

        public function listarParaPagina(): void{
            Auth::exigirPerfil(Perfil::ADMIN);

            $colaboradores = $this->colaborador->listar();

            require_once __DIR__ . "/../Views/dashboard/colaboradores/index.php";
        }

        public function criar(): void
        {
            Auth::exigirPerfil(Perfil::ADMIN);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /dashboard/colaboradores');
                exit;
            }

            $nome = trim($_POST['nome_colaborador'] ?? '');

            if ($nome === '') {
                $_SESSION['erro_colaborador'] = 'O nome do colaborador é obrigatório.';

                header('Location: /dashboard/colaboradores');
                exit;
            }

            try {

                $sucesso = $this->colaborador->criar($nome);

                if ($sucesso) {
                    $_SESSION['sucesso_colaborador'] = 'Colaborador cadastrado com sucesso.';
                } else {
                    $_SESSION['erro_colaborador'] = 'Não foi possível cadastrar o colaborador.';
                }

            } catch (PDOException $e) {

                $_SESSION['erro_colaborador'] = 'Erro ao cadastrar colaborador.';
            }

            header('Location: /dashboard/colaboradores');
            exit;
        }

        public function editar(): void
        {
                Auth::exigirPerfil(Perfil::ADMIN);

                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    header('Location: /dashboard/colaboradores');
                    exit;
                }

                $id = filter_input(INPUT_POST, 'id_colaborador', FILTER_VALIDATE_INT);
                $nome = trim($_POST['nome_colaborador'] ?? '');

                if (!$id) {
                    $_SESSION['erro_colaborador'] = 'Colaborador inválido.';

                    header('Location: /dashboard/colaboradores');
                    exit;
                }

                if ($nome === '') {
                    $_SESSION['erro_colaborador'] = 'Informe o nome do colaborador.';

                    header('Location: /dashboard/colaboradores');
                    exit;
                }

                try {

                    $sucesso = $this->colaborador->editar($id, $nome);

                    if ($sucesso) {
                        $_SESSION['sucesso_colaborador'] = 'Colaborador atualizado com sucesso.';
                    } else {
                        $_SESSION['erro_colaborador'] = 'Não foi possível atualizar o colaborador.';
                    }

                } catch (PDOException $e) {

                    $_SESSION['erro_colaborador'] = 'Erro ao atualizar o colaborador.';
                }

                header('Location: /dashboard/colaboradores');
                exit;
            }

            public function excluir(): void
            {
                Auth::exigirPerfil(Perfil::ADMIN);

                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    header('Location: /dashboard/colaboradores');
                    exit;
                }

                $id = filter_input(
                    INPUT_POST,
                    'id_colaborador',
                    FILTER_VALIDATE_INT
                );

                if (!$id) {
                    $_SESSION['erro_colaborador'] = 'Colaborador inválido.';

                    header('Location: /dashboard/colaboradores');
                    exit;
                }

                try {

                    if ($this->colaborador->excluir($id)) {
                        $_SESSION['sucesso_colaborador'] = 'Colaborador excluído com sucesso.';
                    } else {
                        $_SESSION['erro_colaborador'] = 'Não foi possível excluir o colaborador.';
                    }

                } catch (PDOException $e) {

                    $_SESSION['erro_colaborador'] = 'Erro ao excluir o colaborador.';
                }

                header('Location: /dashboard/colaboradores');
                exit;
            }
}
    
?>