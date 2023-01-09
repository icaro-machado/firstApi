<?php

function conselho()
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //Remoção de autorização para execução local
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); //Remoção de autorização para execução local

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.adviceslip.com/advice",
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

//    postman($json);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "Conselho: " . $json->slip->advice . PHP_EOL;
    }
}

function postman($data, $type = 'json', $die = true)
{
    // Formata o retorno para debug no postman
    if ($type == 'json') {

        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($data);

    } else if ($type == 'var_dump') {

        var_dump($data);
        echo '<br/><br/><br/>';

    } else if ($type == 'string') {
        echo $data.'<br/><br/><br/>';
    } else {
        var_dump($data);
    }

    if ($die) die;
}