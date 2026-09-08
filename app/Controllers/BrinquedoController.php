<?php

    require_once __DIR__ . "/../Models/Brinquedo.php";
    require_once __DIR__ . "/../Core/Auth.php";

    class BrinquedoController{
        private Brinquedo $brinquedo;

        public function __construct(PDO $pdo) {
            $this->brinquedo = new Brinquedo($pdo);
        }

        public function listar():void {
            header('Content-type: application/json; charset=utf-8');

            try {
                $brinquedos = $this->brinquedo->listar();

                http_response_code(200);

                echo json_encode($brinquedos);
            } catch (PDOException $e) {

                http_response_code(500);

                echo json_encode([
                    'sucesso' => false,
                    'mensagem' => 'Erro ao buscar brinquedos'
                ]);
            }
        }

        public function listarParaPagina(): void{

            Auth::exigirPerfil(Perfil::ADMIN);

            $brinquedos = $this->brinquedo->listar();

            require_once __DIR__ . "/../Views/dashboard/brinquedos/index.php";
        }

        public function criar(): void
        {
            Auth::exigirPerfil(Perfil::ADMIN);
            
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /dashboard/brinquedos');
                exit;
            }

            $nome = trim($_POST['nome_brinquedo'] ?? '');

            if ($nome === '') {
                $_SESSION['erro_brinquedo'] = 'O nome do brinquedo é obrigatório.';

                header('Location: /dashboard/brinquedos');
                exit;
            }

            try {

                $sucesso = $this->brinquedo->criar($nome);

                if ($sucesso) {
                    $_SESSION['sucesso_brinquedo'] = 'brinquedo cadastrado com sucesso.';
                } else {
                    $_SESSION['erro_brinquedo'] = 'Não foi possível cadastrar o brinquedo.';
                }

            } catch (PDOException $e) {

                $_SESSION['erro_brinquedo'] = 'Erro ao cadastrar brinquedo.';
            }

            header('Location: /dashboard/brinquedos');
            exit;
        }

        public function editar(): void
        {
            Auth::exigirPerfil(Perfil::ADMIN);

                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    header('Location: /dashboard/brinquedos');
                    exit;
                }

                $id = filter_input(INPUT_POST, 'id_brinquedo', FILTER_VALIDATE_INT);
                $nome = trim($_POST['nome_brinquedo'] ?? '');

                if (!$id) {
                    $_SESSION['erro_brinquedo'] = 'brinquedo inválido.';

                    header('Location: /dashboard/brinquedos');
                    exit;
                }

                if ($nome === '') {
                    $_SESSION['erro_brinquedo'] = 'Informe o nome do brinquedo.';

                    header('Location: /dashboard/brinquedos');
                    exit;
                }

                try {

                    $sucesso = $this->brinquedo->editar($id, $nome);

                    if ($sucesso) {
                        $_SESSION['sucesso_brinquedo'] = 'brinquedo atualizado com sucesso.';
                    } else {
                        $_SESSION['erro_brinquedo'] = 'Não foi possível atualizar o brinquedo.';
                    }

                } catch (PDOException $e) {

                    $_SESSION['erro_brinquedo'] = 'Erro ao atualizar o brinquedo.';
                }

                header('Location: /dashboard/brinquedos');
                exit;
            }

            public function excluir(): void
            {
                Auth::exigirPerfil(Perfil::ADMIN);

                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    header('Location: /dashboard/brinquedos');
                    exit;
                }

                $id = filter_input(
                    INPUT_POST,
                    'id_brinquedo',
                    FILTER_VALIDATE_INT
                );

                if (!$id) {
                    $_SESSION['erro_brinquedo'] = 'brinquedo inválido.';

                    header('Location: /dashboard/brinquedos');
                    exit;
                }

                try {

                    if ($this->brinquedo->excluir($id)) {
                        $_SESSION['sucesso_brinquedo'] = 'brinquedo excluído com sucesso.';
                    } else {
                        $_SESSION['erro_brinquedo'] = 'Não foi possível excluir o brinquedo.';
                    }

                } catch (PDOException $e) {

                    $_SESSION['erro_brinquedo'] = 'Erro ao excluir o brinquedo.';
                }

                header('Location: /dashboard/brinquedos');
                exit;
        }
    }
?>