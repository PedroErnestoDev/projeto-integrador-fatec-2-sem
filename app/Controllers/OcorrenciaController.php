<?php

    require_once __DIR__ . "/../Models/Ocorrencia.php";
    require_once __DIR__ . "/../Core/Auth.php";

    class OcorrenciaController{
        private Ocorrencia $ocorrencia;

        public function __construct(PDO $pdo) {
            $this->ocorrencia = new Ocorrencia($pdo);
        }

        public function criar(): void{
            Auth::exigirLogin();

            $usuario = (int) $_SESSION['id_usuario'];

            $colaborador = $_POST['colaborador'] ?? '';
            $brinquedo = $_POST['brinquedo'] ?? '';
            $op = trim($_POST['op'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $prioridade = $_POST['prioridade'] ?? '';
            

            // Validação
            if (
                empty($colaborador) ||
                empty($brinquedo) ||
                empty($op) ||
                empty($descricao) ||
                empty($prioridade)
            ) {
                http_response_code(400);
                echo "Todos os campos obrigatórios devem ser preenchidos.";
                return;
            }

            // Converte IDs para inteiro
            $colaborador = (int) $colaborador;
            $brinquedo = (int) $brinquedo;
            $prioridade = (int) $prioridade;
            $usuario = (int) $usuario;

            // Cria a ocorrência
            $sucesso = $this->ocorrencia->criar(
                $colaborador,   
                $brinquedo,
                $op,
                $descricao,
                $prioridade,
                $usuario
            );

            if (!$sucesso) {
                http_response_code(500);
                echo "Erro ao cadastrar ocorrência.";
                return;
            }

            // Redirect de acordo com o perfil
            $perfil = Auth::perfil();

            // Ajuste os números conforme seus IDs reais
            if (in_array($perfil, [1, 2], true)) { // 1 = admin, 2 = gerência
                header('Location: /dashboard/ocorrencias?sucesso=1');
                exit;
            }

            // Usuário comum (operador)
            header('Location: /ocorrencias/criar?sucesso=1');
            exit;
    
            }


            public function listarTodas(): void {
                Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

                $ocorrencias = $this->ocorrencia->listarTodas();

                require_once __DIR__ . "/../Views/dashboard/ocorrencias/index.php";
            }

            public function detalhes(int $id): void{
                Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

                if ($id <= 0) {
                    http_response_code(400);
                    echo "ID da ocorrência inválido.";
                    return;
                }

                $ocorrencia = $this->ocorrencia->buscarPorId($id);

                if (!$ocorrencia) {
                    http_response_code(404);
                    echo "Ocorrência não encontrada.";
                    return;
                }

                require_once __DIR__ . "/../Views/dashboard/ocorrencias/detalhes.php";
            }

            public function editar(int $id): void {
                Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

                if ($id <= 0) {
                    http_response_code(400);
                    echo "ID da ocorrência inválido.";
                    return;
                }

                $ocorrencia = $this->ocorrencia->buscarPorId($id);

                if (!$ocorrencia) {
                    http_response_code(404);
                    echo "Ocorrência não encontrada.";
                    return;
                }

                require_once __DIR__ . "/../Views/dashboard/ocorrencias/editar.php";
            }

            public function atualizar(int $id): void {
                
                Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

                if ($id <= 0) {
                    http_response_code(400);
                    echo "ID da ocorrência inválido.";
                    return;
                }

                $colaborador = (int) ($_POST['colaborador'] ?? 0);

                $brinquedo = (int) ($_POST['brinquedo'] ?? 0);

                $ordemProducao = trim(
                    $_POST['ordem_producao'] ?? ''
                );

                $descricao = trim(
                    $_POST['descricao_ocorrencia'] ?? ''
                );

                $solucao = trim(
                    $_POST['solucao_ocorrencia'] ?? ''
                );

                $prioridade = (int) (
                    $_POST['prioridade'] ?? 0
                );

                $status = (int) (
                    $_POST['status'] ?? 0
                );


                /*
                * Validação
                */

                if (
                    $colaborador <= 0 ||
                    $brinquedo <= 0 ||
                    $ordemProducao === '' ||
                    $descricao === '' ||
                    $prioridade <= 0 ||
                    $status <= 0
                ) {

                    http_response_code(400);

                    echo "Preencha todos os campos obrigatórios.";

                    return;
                }


                /*
                * Se solução estiver vazia,
                * envia NULL para o banco.
                */

                if ($solucao === '') {
                    $solucao = null;
                }


                /*
                * Atualiza
                */

                $sucesso = $this->ocorrencia->atualizar(
                    $id,
                    $colaborador,
                    $brinquedo,
                    $ordemProducao,
                    $descricao,
                    $solucao,
                    $prioridade,
                    $status
                );


                if (!$sucesso) {

                    http_response_code(500);

                    echo "Erro ao atualizar a ocorrência.";

                    return;
                }


                /*
                * Volta para detalhes
                */

                header(
                    'Location: /dashboard/ocorrencias/detalhes/'
                    . $id
                    . '?sucesso=1'
                );

                exit;
            }

            public function deletar(int $id): void{
                    Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

                    if ($id <= 0) {
                        http_response_code(400);
                        echo "ID da ocorrência inválido.";
                        return;
                    }

                    $ocorrencia = $this->ocorrencia->buscarPorId($id);

                    if (!$ocorrencia) {
                        http_response_code(404);
                        echo "Ocorrência não encontrada.";
                        return;
                    }

                    $sucesso = $this->ocorrencia->deletar($id);

                    if (!$sucesso) {
                        http_response_code(500);
                        echo "Erro ao excluir a ocorrência.";
                        return;
                    }

                    header('Location: /dashboard/ocorrencias');
                    exit;
        }

        public function criarFormularioAdmin(): void
        {
            Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

            require_once __DIR__ .
                '/../Views/dashboard/ocorrencias/criar.php';
        }

        public function encaminhar(int $id): void{
            Auth::exigirPerfil(Perfil::ADMIN, Perfil::SUPERVISOR);

           if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: /ocorrencias');
                exit;
            }

            $id = (int) ($_POST['id_ocorrencia'] ?? 0);
            $fkSetor = (int) ($_POST['fk_setor'] ?? 0);


            if ($id <= 0 || $fkSetor <= 0) {
                $_SESSION['erro'] = 'Ocorrência ou setor inválido.';

                header('Location: /ocorrencias');
                exit;
            }


            $sucesso = $this->ocorrencia->encaminhar(
                $id,
                $fkSetor
            );


            if ($sucesso) {
                $_SESSION['sucesso'] = 'Ocorrência encaminhada com sucesso.';
            } else {
                $_SESSION['erro'] = 'Erro ao encaminhar ocorrência.';
            }


            header('Location: /dashboard/ocorrencias');
            exit;
        }

        public function historico(): void{
            Auth::exigirPerfil(Perfil::ADMIN);

            $historicos = $this->ocorrencia->listarHistorico();

            require_once __DIR__ . '/../Views/dashboard/relatorios/index.php';
        }
    }
?>