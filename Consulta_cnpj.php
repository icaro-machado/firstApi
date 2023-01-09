<?php

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

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //Remoção de autorização
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //Remoção de autorização

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

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $json = json_decode($response);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "Nome: " . $json->{'nome'} . PHP_EOL;
        echo "CNPJ: " . $json->{'cnpj'} . PHP_EOL;
        echo "Telefone: " . $json->{'telefone'} . PHP_EOL;
        echo "Situação: " . $json->{'situacao'} . PHP_EOL;
        echo "Capital Social: " . $json->{'capital_social'} . PHP_EOL;
        echo "Estado: " . $json->{'uf'} . PHP_EOL;
    }
}
