<?php
function get_users()
{
    $params = $_REQUEST;
    response($params);
}

function post_users()
{
    $params = file_get_contents('php://input');
    $params = json_decode($params, true);
    response($params, 201);
}

function consulta_cnpj()
{
    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['PATH_INFO'];
    $cnpj = "00000000000191";
    $caminho = "https://receitaws.com.br/v1/cnpj/".$cnpj;
    $path = $caminho;
    $function = $routes[$method][$path] && null;
    response($function, 200);
}

function consulta_cnpj_teste()
{
    $cnpj = "22896431000110";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://receitaws.com.br/v1/cnpj/$cnpj",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
    ]);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //Remoção de autorização
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //Remoção de autorização

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

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

$variavelStatus = null;
function alterarLigado()
{
    $variavelStatus = "Ligado";
    response($variavelStatus,201);
}

function alterarDesligado()
{
    $variavelStatus = "Desligado";
    response($variavelStatus,201);
}