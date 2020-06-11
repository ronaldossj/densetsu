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
$query = "INSERT INTO postagens (titulo, texto, autor, dataPublicacao) VALUES ('$titulo', '$texto', $autorId, '$dataPublicao')";

require_once __DIR__. "/../db.php";


if($db->query($query) == true){

    header('Location: ../admin.php');

}else{
    print_r($db->error);
}