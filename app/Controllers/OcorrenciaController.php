<?php

    require_once __DIR__ . "/../Models/Ocorrencia.php";

    class OcorrenciaController{
        private Ocorrencia $ocorrencia;

        public function __construct(PDO $pdo) {
            $this->ocorrencia = new Ocorrencia($pdo);
        }

        public function criar(): void{

            if(session_start() === PHP_SESSION_NONE){
                session_start();
            }

            if(!isset($_SESSION['id_usuario'])){
                header('Location: /login');
            }

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

            // Redireciona após cadastrar
            header('Location: /ocorrencias/criar?sucesso=1');
            exit;
            }
    }
?>