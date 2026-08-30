<?php

require_once __DIR__ . '/../app/Config/db.php';

require_once __DIR__ . '/../app/Models/Usuario.php';
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

require_once __DIR__ . '/../app/Models/Colaborador.php';
require_once __DIR__ . '/../app/Controllers/ColaboradorController.php';

require_once __DIR__ . '/../app/Models/Brinquedo.php';
require_once __DIR__ . '/../app/Controllers/BrinquedoController.php';

require_once __DIR__ . '/../app/Models/Ocorrencia.php';
require_once __DIR__ . '/../app/Controllers/OcorrenciaController.php';

require_once __DIR__ . '/../app/Controllers/DashboardController.php';

require_once __DIR__ . '/../app/Core/Router.php';


$db = new DB();
$pdo = $db->conectar();

$router = new Router();

// CONTROLLERS
$usuarioController = new UsuarioController($pdo);
$colaboradorController = new ColaboradorController($pdo);
$brinquedoController = new BrinquedoController($pdo);
$ocorrenciaController = new OcorrenciaController($pdo);
$dashboardController = new DashboardController($pdo);

// VIEWS

$router->get('/', function () {
    header('Location: /login');
});

$router->get('/login', function () {
    require_once __DIR__ . '/../app/Views/login.php';
});

$router->get('/ocorrencias/criar', function () {
    require_once __DIR__ . '/../app/Views/ocorrencias/criar/index.php';
});

$router->get('/dashboard', function () use ($dashboardController){
    $dashboardController->index();
});


$router->post('/ocorrencias/criar', function () use ($ocorrenciaController) {
    $ocorrenciaController->criar();
});

// LOGIN

$router->post('/login', function () use ($usuarioController) {
    $usuarioController->login();
});


// API COLABORADORES

$router->get('/api/colaboradores', function () use ($colaboradorController) {
    $colaboradorController->listar();
});

$router->get('/api/brinquedos', function () use ($brinquedoController) {
    $brinquedoController->listar();
});


$router->dispatch();