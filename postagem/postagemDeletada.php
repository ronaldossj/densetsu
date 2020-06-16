<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
$erro = NULL;
$erro .= valida($_GET['id'], "erro");


function valida($dado, $mensagem)
{
    if (!isset($dado) || empty($dado)) {
        return $mensagem;
    }
    return NULL;
}
if (!is_null($erro)) {
    echo $erro;
}

$id = $_GET['id'];
require_once __DIR__ . "/../pdo.php";
$query = "DELETE FROM postagens WHERE id='$id'";
$deletou = $pdo->exec($query);

if ($deletou) {
    header('Location: ./lista.php');
} else {
    print_r($pdo->error);
}