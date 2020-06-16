<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
$erro = NULL;
$erro .= valida($_POST['titulo'], "erro");
$erro .= valida($_POST['texto'], "erro");


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
$autorId = $_SESSION['usuario']['id'];
$dataPublicao = date("Y-m-d H:i:s");
require_once __DIR__. "/../pdo.php";
$query = "INSERT INTO postagens (titulo, texto, autor, dataPublicacao) VALUES ('$titulo', '$texto', $autorId, '$dataPublicao')";
$inseriu = $pdo->exec($query);

if($inseriu){
    header('Location: ../admin.php');

}else{
    print_r($pdo->error);
}