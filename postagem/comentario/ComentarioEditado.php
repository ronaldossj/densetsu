<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
$erro = NULL;
$erro .= valida($_POST['comentario'], "erro");
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
$idPagina = $_GET['idPagina'];
$texto = $_POST['comentario'];
$dataPublicao = date("Y-m-d H:i:s");
$id = $_GET['id'];
$query = "UPDATE comentario SET comentario='$texto' WHERE id='$id'";
print_r($query);
require_once __DIR__ . "/../../db.php";


if ($db->query($query) == true) {

    header('Location: ./../publicacao.php?id='.$idPagina);
} else {
    print_r($db->error);
}
