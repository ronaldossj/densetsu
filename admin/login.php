<?php
    session_start();

    $erro = null;
    $alertaUsuarioSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Usuário e Senha inválidos.</div>";
    $alertaUsuario = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Usuário.</div>";
    $alertaSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Senha.</div>";
if(!isset($_POST['usuario']) || empty($_POST['usuario'])){
    $erro .= $alertaUsuario;
}
if(!isset($_POST['senha']) || empty($_POST['senha'])){
    $erro .= $alertaSenha;
}
if(!is_null($erro)){
    $_SESSION['mensagem'] = $erro;
    header('Location: ../login.php');
    die;
}

require_once __DIR__."/../db.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$query = "SELECT id, nome, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND ativo = 1";

$result = $db->query($query);

if($result->num_rows > 0){
    $usuarioSistema = $result->fetch_assoc();
    $_SESSION['usuario'] = ['id' => $usuarioSistema ['id'], 'nome' => $usuarioSistema['nome'], 'email' => $usuarioSistema['email']];
    header('Location: ../admin.php');
    die;
}
$_SESSION['mensagem'] = $alertaUsuarioSenha;
header('Location: ../login.php');