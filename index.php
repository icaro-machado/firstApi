<?php

require "TestesPhp.php";
require "Users.php";
require "Consulta_cnpj.php";
require "Variavel.php";
require "Conselho.php";
require "BancoDB.php";
require "UsuariosAleatorios.php";

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];

$routes = [
    'GET' => [
        '/users' => 'get_users',
        '/phpinfo' => 'phpinfo',
        '/consultacnpj' => 'consulta_cnpj',
        '/consultacnpjteste' => 'consulta_cnpj_teste',
        '/variaveisphp' => 'variaveisPhp',
        '/conselho' => 'conselho',
        '/exibindobanco' => 'exibindoBanco'
    ],
    'POST' => [
        '/users' => 'post_users',
        '/ligar' => 'alterarLigado',
        '/desligar' => 'alterarDesligado',
        '/adicionar' => 'salvandoBanco',
        '/inusuarioaleatorio' => 'inserindoUsuarioAleatorio',
        '/reusuarioaleatorio' => 'removendoUsuarioAleatorio'
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