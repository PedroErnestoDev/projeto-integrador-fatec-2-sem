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

require_once __DIR__ . '/../app/Core/Router.php';


$db = new DB();
$pdo = $db->conectar();

$router = new Router();


// CONTROLLERS
$usuarioController = new UsuarioController($pdo);
$colaboradorController = new ColaboradorController($pdo);
$brinquedoController = new BrinquedoController($pdo);
$ocorrenciaController = new OcorrenciaController($pdo);

// VIEWS

$router->get('/login', function () {
    require_once __DIR__ . '/../app/Views/login.php';
});

$router->get('/ocorrencias/criar', function () {
    require_once __DIR__ . '/../app/Views/ocorrencias/criar/index.php';
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