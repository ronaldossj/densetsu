<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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
    header('Location: ../login.php');
    die;
}

$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$ativo = 1;


require_once __DIR__."/../../pdo.php";

$query = "INSERT INTO usuarios (email, usuario, senha, nome, ativo) VALUES ('$email', '$usuario', '$senha', '$nome', $ativo);";

$inseriu = $pdo->exec($query);
if($inseriu){

    $_SESSION['mensagem'] = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Cadastro realizado com sucesso.</div>";
    header('Location: /../../login.php');

}else{
    print_r($pdo->errorInfo());
}
