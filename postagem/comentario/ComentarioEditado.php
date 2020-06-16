<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once __DIR__ ."/../../functions.php";
$erro = NULL;
$erro .= valida($_POST['comentario'], "erro");
$erro .= valida($_GET['id'], "erro");

if (!is_null($erro)) {
    echo $erro;
}
$idPagina = $_GET['idPagina'];
$texto = $_POST['comentario'];
$dataPublicao = date("Y-m-d H:i:s");
$id = $_GET['id'];
require_once __DIR__ . "/../../pdo.php";
require_once __DIR__ . "/../../helpers/dbHelper.php";
$query = gerarUpdate('comentario', $query = ["comentario" => "$texto"], "id = $id");

$atualiza = $pdo->exec($query);

if ($atualiza) {

    header('Location: ./../publicacao.php?id='.$idPagina);
} else {
    print_r($pdo->error);
}
