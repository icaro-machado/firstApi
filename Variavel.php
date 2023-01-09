<?php

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