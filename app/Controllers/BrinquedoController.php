<?php

    require_once __DIR__ . "/../Models/Brinquedo.php";

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
    }
?>