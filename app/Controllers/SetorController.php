<?php

    require_once __DIR__ . "/../Models/Setor.php";

    class SetorController{
        private Setor $setor;

        public function __construct(PDO $pdo) {
            $this->setor = new Setor($pdo);
        }

        public function listar(): void{
            header('Content-type: application/json; charset=utf-8');

            try {
                $setores = $this->setor->listar();

                http_response_code(200);

                echo json_encode($setores);
            } catch (PDOException $e) {

                http_response_code(500);

                echo json_encode([
                    'sucesso' => false,
                    'mensagem' => 'Erro ao buscar setores'
                ]);
        }
    }

    public function listarParaPagina(): void{
        Auth::exigirPerfil(Perfil::ADMIN);

        $setores = $this->setor->listar();

        require_once __DIR__ . "/../Views/dashboard/setores/index.php";
    }

    public function criar() : void {
        Auth::exigirPerfil(Perfil::ADMIN);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dashboard/setores');
            exit;
        }

        $nome = trim($_POST['nome_setor'] ?? '');

        if ($nome === '') {
            $_SESSION['erro_setor'] = 'Informe o nome do setor.';
            header('Location: /dashboard/setores');
            exit;
        }

        try {

            $resultado = $this->setor->criar($nome);

            if (!$resultado) {
                $_SESSION['erro_setor'] = 'Erro ao cadastrar setor.';
                header('Location: /dashboard/setores');
                exit;
            }

            $_SESSION['sucesso_setor'] = 'Setor cadastrado com sucesso.';

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                $_SESSION['erro_setor'] = 'Este setor já está cadastrado.';
            } else {
                $_SESSION['erro_setor'] = 'Erro ao cadastrar setor.';
            }
        }

        header('Location: /dashboard/setores');
        exit;
    }

    public function atualizar(): void
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dashboard/setores');
            exit;
        }

        $id = (int) ($_POST['id_setor'] ?? 0);
        $nome = trim($_POST['nome_setor'] ?? '');

        if ($id <= 0 || $nome === '') {
            $_SESSION['erro_setor'] = 'Preencha todos os campos.';
            header('Location: /dashboard/setores');
            exit;
        }

        try {
            $resultado = $this->setor->atualizar($id, $nome);

            if (!$resultado) {
                $_SESSION['erro_setor'] = 'Erro ao atualizar setor.';
            } else {
                $_SESSION['sucesso_setor'] = 'Setor atualizado com sucesso.';
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['erro_setor'] = 'Este setor já está cadastrado.';
            } else {
                $_SESSION['erro_setor'] = 'Erro ao atualizar setor.';
            }
        }

        header('Location: /dashboard/setores');
        exit;
    }

    public function deletar(): void
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /dashboard/setores');
            exit;
        }

        $id = (int) ($_POST['id_setor'] ?? 0);

        if ($id <= 0) {
            $_SESSION['erro_setor'] = 'Setor inválido.';
            header('Location: /dashboard/setores');
            exit;
        }

        try {
            $resultado = $this->setor->deletar($id);

            if (!$resultado) {
                $_SESSION['erro_setor'] = 'Erro ao excluir setor.';
            } else {
                $_SESSION['sucesso_setor'] = 'Setor excluído com sucesso.';
            }
        } catch (PDOException $e) {
            $_SESSION['erro_setor'] = 'Erro ao excluir setor.';
        }

        header('Location: /dashboard/setores');
        exit;
    }
}
?>