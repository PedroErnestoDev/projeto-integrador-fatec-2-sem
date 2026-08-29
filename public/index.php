<?php

require_once __DIR__ . '/../app/Config/db.php';
require_once __DIR__ . '/../app/Models/Usuario.php';
require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
require_once __DIR__ . '/../app/Core/Router.php';

$db = new DB();
$pdo = $db->conectar();

$router = new Router();

$router->get('/login', function () {
    require_once __DIR__ . '/../app/Views/login.php';
});

$usuarioController = new UsuarioController($pdo);

$router->post('/login', function () use ($usuarioController) {
    $usuarioController->login();
});

$router->dispatch();