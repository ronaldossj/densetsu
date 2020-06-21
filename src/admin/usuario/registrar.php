<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$alertaSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Senha corretamente.</div>";
$alertaEmail = "<div class='alertEmail'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo E-mail corretamente.</div>";
$alertaUsuario = "<div class='alertUsuario'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Usuário corretamente.</div>";
$erro = NULL;

require_once __DIR__ . "/../../functions.php";
$erro .= valida($_POST['email'], $alertaEmail);
$erro .= valida($_POST['usuario'], $alertaUsuario);
$erro .= valida($_POST['senha'], $alertaSenha);


session_start();


if (!empty($erro)) {

    $_SESSION['mensagem'] = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Não foi possivel cadastrar</div>";
    header('Location: /../../registrar.php');
    die;
}

$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$ativo = 1;


require_once __DIR__ . "/../../pdo.php";
require_once __DIR__ . "/../../helpers/dbHelper.php";

$query = gerarInsert('usuarios', $valores = ["email" => "$email", "usuario" => "$usuario", "senha" => "$senha", "nome" => "$nome", "ativo" => "$ativo"]);

$inseriu = $pdo->exec($query);
if ($inseriu) {

    $_SESSION['mensagem'] = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Cadastro realizado com sucesso.</div>";
    header('Location: /../../login.php');
} else {
    print_r($pdo->errorInfo());
}
