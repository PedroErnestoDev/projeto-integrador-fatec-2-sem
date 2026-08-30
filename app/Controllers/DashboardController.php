<?php

    require_once __DIR__ . '/../Core/Perfil.php';
    require_once __DIR__ . '/../Core/Auth.php';
    require_once __DIR__ . '/../Models/Ocorrencia.php';

    class DashboardController{

        private Ocorrencia $ocorrencia;

        public function __construct(PDO $pdo){
            $this->ocorrencia = new Ocorrencia($pdo);
        }

        public function index(): void {
            Auth::exigirPerfil(Perfil::ADMIN);

            $ocorrencias = $this->ocorrencia->listarCincoRecentes();

            $estatisticas = $this->ocorrencia->contarPorStatus();

            $estatisticaPrioridade = $this->ocorrencia->contarPorPrioridade();

            $topBrinquedos = $this->ocorrencia->listarTopCincoBrinquedos();
            
            require_once __DIR__ . "/../Views/dashboard/index.php";
        }
    }
?>