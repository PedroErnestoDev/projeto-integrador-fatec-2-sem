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
require_once __DIR__ . '/../app/Controllers/SetorController.php';

require_once __DIR__ . '/../app/Core/Auth.php';


$db = new DB();
$pdo = $db->conectar();

$router = new Router();

$usuarioController = new UsuarioController($pdo);
$colaboradorController = new ColaboradorController($pdo);
$brinquedoController = new BrinquedoController($pdo);
$ocorrenciaController = new OcorrenciaController($pdo);
$dashboardController = new DashboardController($pdo);
$setorController = new SetorController($pdo);

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

$router->post('/logout', function (){

    Auth::deslogar();

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

$router->post('/dashboard/ocorrencias/encaminhar/{id}', function (int $id) use ($ocorrenciaController) {

    $ocorrenciaController->encaminhar($id);

});

$router->get('/dashboard/brinquedos', function () use ($brinquedoController) {

    $brinquedoController->listarParaPagina();

});

$router->get('/dashboard/colaboradores', function () use ($colaboradorController) {

    $colaboradorController->listarParaPagina();

});

$router->get('/dashboard/setores', function () use ($setorController) {

    $setorController->listarParaPagina();

});

$router->get('/dashboard/usuarios', function () use ($usuarioController) {

    $usuarioController->listarParaPagina();

});



$router->post('/dashboard/usuarios/criar', function () use ($usuarioController) {

    $usuarioController->criar();

});

$router->post('/dashboard/usuarios/editar', function () use ($usuarioController) {

    $usuarioController->atualizar();

});

$router->post('/dashboard/usuarios/excluir', function () use ($usuarioController) {

    $usuarioController->excluir();

});

$router->post('/dashboard/setores/criar', function () use ($setorController) {

    $setorController->criar();

});

$router->post('/dashboard/setores/editar', function () use ($setorController) {

    $setorController->atualizar();

});

$router->post('/dashboard/setores/excluir', function () use ($setorController) {

    $setorController->deletar();

});

$router->post('/dashboard/colaboradores/criar', function () use ($colaboradorController) {

    $colaboradorController->criar();

});

$router->post('/dashboard/colaboradores/editar', function () use ($colaboradorController) {

    $colaboradorController->editar();

});

$router->post('/dashboard/colaboradores/excluir', function () use ($colaboradorController) {

    $colaboradorController->excluir();

});

$router->post('/dashboard/brinquedos/criar', function () use ($brinquedoController) {

    $brinquedoController->criar();

});

$router->post('/dashboard/brinquedos/editar', function () use ($brinquedoController) {

    $brinquedoController->editar();

});

$router->post('/dashboard/brinquedos/excluir', function () use ($brinquedoController) {

    $brinquedoController->excluir();

});


$router->get('/api/colaboradores', function () use ($colaboradorController) {

    $colaboradorController->listar();

});


$router->get('/api/brinquedos', function () use ($brinquedoController) {

    $brinquedoController->listar();

});

$router->get('/api/setores', function () use ($setorController) {

    $setorController->listar();

});


$router->dispatch();
