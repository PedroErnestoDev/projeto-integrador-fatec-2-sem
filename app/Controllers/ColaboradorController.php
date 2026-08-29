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
    }
?>