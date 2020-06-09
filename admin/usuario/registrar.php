<?php
$alertaSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Senha corretamente.</div>";
$alertaEmail = "<div class='alertEmail'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo E-mail corretamente.</div>";
$alertaUsuario = "<div class='alertUsuario'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Usuário corretamente.</div>";
$erro = NULL;
if(!isset($_POST['email']) || empty($_POST['email'])){
    $erro .= $alertaEmail;
}
if(!isset($_POST['usuario']) || empty($_POST['usuario'])){
    $erro .= $alertaUsuario;
}
if(!isset($_POST['senha']) || empty($_POST['senha'])){
    $erro .= $alertaSenha;
}
session_start();

if(!is_null($erro)){
    $_SESSION['mensagem'] = $erro;
    header('Location: ../../registrar.php');
    die;
}

$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$ativo = 1;


require_once __DIR__."/../../db.php";

$query = "INSERT INTO usuarios (email, usuario, senha, nome, ativo) VALUES ('$email', '$usuario', '$senha', '$nome', $ativo)";

if($db->query($query) == true){

    $_SESSION['mensagem'] = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Cadastro realizado com sucesso.</div>";
    header('Location: ../../registrar.php');

}else{
    print_r($db->error);
}
