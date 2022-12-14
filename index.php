<?php

require "funcoes.php";

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];

$routes = [
    'GET' => [
        '/users' => 'get_users',
        '/phpinfo' => 'phpinfo',
        '/consultacnpj' => 'consulta_cnpj',
        '/consultacnpjteste' => 'consulta_cnpj_teste',
        '/variaveisphp' => 'variaveisPhp'
    ],
    'POST' => [
        '/users' => 'post_users',
        '/ligar' => 'alterarLigado',
        '/desligar' => 'alterarDesligado'
    ]
];

$function = $routes[$method][$path] ?? null;

if(!is_null($function)) {
    $function();
} else {
    response([
        'error' => 'Pagina não encontrada!'
    ], 404);
}