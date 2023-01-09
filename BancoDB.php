<?php

function salvandoBanco($nome, $sexo, $email)
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "mysql";

    $link = mysqli_connect($servername, $username, $password, $database);

    if (!$link) {
        die("Não foi possível conectar: " . mysqli_error() . PHP_EOL);
    } else {
        echo "Conexão com banco de dados realizada com sucesso" . PHP_EOL;
    }

    $linhas = "SELECT id from `usuarios`";
    $result = mysqli_query($link, $linhas);
    $num_rows = mysqli_num_rows($result);

    $query = "INSERT INTO `usuarios` (`id`, `name`, `sexo`, `email`) VALUES ($num_rows, '$nome', '$sexo', '$email')";

    if (mysqli_query($link, $query)) {
        echo "Registro salvo!" . PHP_EOL;
    } else {
        echo "Erro durante o registro" . $query . PHP_EOL . mysqli_error($link);
    }

    mysqli_close($link);
}

function removendoBanco()
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "mysql";

    $link = mysqli_connect($servername, $username, $password, $database);

    if (!$link) {
        die("Não foi possível conectar: " . mysqli_error() . PHP_EOL);
    } else {
        echo "Conexão com banco de dados realizada com sucesso" . PHP_EOL;
    }

    $linhas = "SELECT id from `usuarios`";
    $result = mysqli_query($link, $linhas);
    $num_rows = mysqli_num_rows($result);

    $random = rand(0, $num_rows);

    $query = "DELETE FROM `usuarios` WHERE id = $random";
    if (mysqli_query($link, $query)) {
        echo "Usuário id $random removido!" . PHP_EOL;
    } else {
        echo "Erro durante a exclusão" . $query . PHP_EOL . mysqli_error($link);
    }

    mysqli_close($link);
}

function exibindoBanco()
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "mysql";

    $link = mysqli_connect($servername, $username, $password, $database);

    if (!$link) {
        die("Não foi possível conectar: " . mysqli_error() . PHP_EOL . PHP_EOL);
    } else {
        echo "Conexão com banco de dados realizada com sucesso" . PHP_EOL . PHP_EOL;
    }

    $linhas = "SELECT name from `usuarios`";
    $result = mysqli_query($link, $linhas);

    while($row = mysqli_fetch_row($result))
    {
        echo "Nome: $row[0]" . PHP_EOL;
    }
}