<?php

function variaveisPhp()
{
    $params = [
        "Caminho do arquivo: " . $_SERVER['DOCUMENT_ROOT'],
        "Nome do arquivo: " . $_SERVER['SCRIPT_FILENAME']
    ];
    response($params);
}

function response($body = null, int $status_code = 200)
{
    header_remove();
    http_response_code($status_code);
    header('Content-Type: application/json');

    if($body) {
        echo json_encode($body);
    }
}