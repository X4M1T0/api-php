<?php
require 'services/Router.php';
require 'controllers/fiscal/fiscal.controller.php';

header('Content-Type: application/json');

$router = new Router();
$fiscalController = new FiscalController();

// Definindo rotas
$router->add('GET', '/fiscal/crc', function() use ($fiscalController) {
    // Pega o parâmetro 'data' da URL
    $data = $_GET['data'] ?? null;

    if (!$data) {
        http_response_code(400);
        echo json_encode(['error' => 'Parâmetro "data" é obrigatório']);
        return;
    }

    echo $fiscalController->crc($data);
});


// Disparando o roteamento
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($method, $path);
