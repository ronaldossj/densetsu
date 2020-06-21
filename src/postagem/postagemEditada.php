<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once __DIR__ . "/../pdo.php";
require_once __DIR__ . "/../helpers/dbHelper.php";
require_once __DIR__ . "/../functions.php";
$erro = NULL;
$erro .= valida($_POST['titulo'], "erro");
$erro .= valida($_POST['texto'], "erro");
$erro .= valida($_GET['id'], "erro");

if (!is_null($erro)) {
    echo $erro;
}

$titulo = $_POST['titulo'];

$texto = $_POST['texto'];
$dataPublicao = date("Y-m-d H:i:s");
$id = $_GET['id'];

$query = gerarUpdate("postagens", ['titulo'=>"$titulo"],"id='$id'");

$atualizou = $pdo->exec($query);

if ($atualizou) {

    header('Location: ./lista.php');
} else {
    print_r($pdo->error);
}
