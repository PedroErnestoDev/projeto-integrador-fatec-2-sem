<?php

require_once __DIR__ . '/../app/Config/db.php';

require_once __DIR__ . '/../app/Core/Router.php';

require_once __DIR__ . '/../app/Models/Usuario.php';
require_once __DIR__ . '/../app/Models/Colaborador.php';
require_once __DIR__ . '/../app/Models/Brinquedo.php';
require_once __DIR__ . '/../app/Models/Ocorrencia.php';

require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../app/Controllers/ColaboradorController.php';
require_once __DIR__ . '/../app/Controllers/BrinquedoController.php';
require_once __DIR__ . '/../app/Controllers/OcorrenciaController.php';
require_once __DIR__ . '/../app/Controllers/DashboardController.php';


$db = new DB();
$pdo = $db->conectar();

$router = new Router();

$usuarioController = new UsuarioController($pdo);
$colaboradorController = new ColaboradorController($pdo);
$brinquedoController = new BrinquedoController($pdo);
$ocorrenciaController = new OcorrenciaController($pdo);
$dashboardController = new DashboardController($pdo);

$router->get('/', function () {

    header('Location: /login');
    exit;

});


$router->get('/login', function () {

    require_once __DIR__ . '/../app/Views/login.php';

});


$router->post('/login', function () use ($usuarioController) {

    $usuarioController->login();

});


$router->get('/ocorrencias/criar', function () {

    require_once __DIR__ . '/../app/Views/ocorrencias/criar/index.php';

});


$router->post('/ocorrencias/criar', function () use ($ocorrenciaController) {

    $ocorrenciaController->criar();

});

$router->get('/dashboard/ocorrencias/criar', function () use ($ocorrenciaController) {
    $ocorrenciaController->criarFormularioAdmin();
});


$router->get('/dashboard', function () use ($dashboardController) {

    $dashboardController->index();

});

$router->get('/dashboard/ocorrencias', function () use ($ocorrenciaController) {

    $ocorrenciaController->listarTodas();

});


$router->get('/dashboard/ocorrencias/detalhes/{id}', function (int $id) use ($ocorrenciaController) {

    $ocorrenciaController->detalhes($id);

});


$router->get('/dashboard/ocorrencias/editar/{id}', function (int $id) use ($ocorrenciaController) {

    $ocorrenciaController->editar($id);

});


$router->post('/dashboard/ocorrencias/editar/{id}', function (int $id) use ($ocorrenciaController) {

    $ocorrenciaController->atualizar($id);

});


$router->delete('/dashboard/ocorrencias/excluir/{id}', function (int $id) use ($ocorrenciaController) {

    $ocorrenciaController->deletar($id);

});


$router->get('/api/colaboradores', function () use ($colaboradorController) {

    $colaboradorController->listar();

});


$router->get('/api/brinquedos', function () use ($brinquedoController) {

    $brinquedoController->listar();

});


$router->dispatch();
