<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once __DIR__ . "/../pdo.php";
require_once __DIR__ . "/../helpers/dbHelper.php";
require_once __DIR__ . "/../functions.php";
$erro = NULL;
$erro .= valida($_POST['titulo'], "erro");
$erro .= valida($_POST['texto'], "erro");

if (!is_null($erro)) {
    echo $erro;
}

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$autorId = $_SESSION['usuario']['id'];
$dataPublicao = date("Y-m-d H:i:s");

$query = gerarInsert("postagens", $valores=["titulo"=>"$titulo", "texto"=>"$texto", "autor"=>"$autorId", "dataPublicacao"=>"$dataPublicao"]);
$inseriu = $pdo->exec($query);

if($inseriu){
    header('Location: ../admin.php');

}else{
    print_r($pdo->error);
}