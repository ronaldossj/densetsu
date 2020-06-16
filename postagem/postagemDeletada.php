<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once __DIR__."/../functions.php";
require_once __DIR__ . "/../pdo.php";
require_once __DIR__ . "/../helpers/dbHelper.php";
$erro = NULL;
$erro .= valida($_GET['id'], "erro");

if (!is_null($erro)) {
    echo $erro;
}
$id = $_GET['id'];
$query = gerarDelete("postagens", "id='$id'");
$deletou = $pdo->exec($query);

if ($deletou) {
    header('Location: ./lista.php');
} else {
    print_r($pdo->error);
}