<?php

function inserindoUsuarioAleatorio()
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //Remoção de autorização para execução local
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //Remoção de autorização para execução local

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://randomuser.me/api/",
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

    $nome = $json->results[0]->name->title . " " . $json->results[0]->name->first . " " . $json->results[0]->name->last;
    $sexo = $json->results[0]->gender;
    $email = $json->results[0]->email;

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "Nome: " . $nome . PHP_EOL;
        echo "Gênero: " . $sexo . PHP_EOL;
        echo "Email: " . $email . PHP_EOL;
        echo "País: " . $json->results[0]->location->country . PHP_EOL;
        echo "Info: " . $json->info->seed . PHP_EOL;
        salvandoBanco($nome, $sexo, $email);
    }
}

function removendoUsuarioAleatorio()
{
    removendoBanco();
}