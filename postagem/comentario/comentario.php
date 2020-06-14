<?php
session_start();
require_once __DIR__. "/../../functions.php";
require_once __DIR__. "/../../db.php";

$erro .= valida($_POST['comentario'], "erro");
$erro .= valida($_POST['idPublicacao'], "erro");

$id = $_POST['idPublicacao'];

$comentario = $_POST['comentario'];
$dataComentario = date("Y-m-d H:i:s");
$idUsuario = $_SESSION['usuario']['id'];

$query = "INSERT INTO comentario (comentario, idPostagem, dataComentario, usuario_id) VALUES ('$comentario', '$id', '$dataComentario', '$idUsuario')";

if($db->query($query) == true){
    $_SESSION['mensagem'] = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Comentário publicado com sucesso.</div>";
    header('Location: ./../publicacao.php?id='.$id);
}else{
    print_r($db->error);
}
