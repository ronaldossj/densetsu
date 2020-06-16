<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
$erro = NULL;
$erro .= valida($_POST['titulo'], "erro");
$erro .= valida($_POST['texto'], "erro");
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

$titulo = $_POST['titulo'];

$texto = $_POST['texto'];
$dataPublicao = date("Y-m-d H:i:s");
$id = $_GET['id'];
require_once __DIR__ . "/../pdo.php";
$query = "UPDATE postagens SET titulo='$titulo', texto='$texto' WHERE id='$id'";
$atualizou = $pdo->exec($query);

if ($atualizou) {

    header('Location: ./lista.php');
} else {
    print_r($pdo->error);
}
