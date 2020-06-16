<?php
    session_start();
    require_once __DIR__. "/../functions.php";
    $erro = null;
    $alertaUsuarioSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Usuário e Senha inválidos.</div>";
    $alertaUsuario = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Usuário.</div>";
    $alertaSenha = "<div class='alert'><span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> Favor, preencher o campo Senha.</div>";


$erro .= valida($_POST['usuario'], $alertaUsuario);
$erro .= valida($_POST['senha'], $alertaSenha);

if(!empty($erro)){
    $_SESSION['mensagem'] = $erro;
    header('Location: ../login.php');
    die;
}

require_once __DIR__."/../pdo.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$query = "SELECT id, nome, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND ativo = 1";

$result = $pdo->query($query)->fetch();

if($result){
    $_SESSION['usuario'] = ['id' => $result ['id'], 'nome' => $result['nome'], 'email' => $result['email']];
    header('Location: ../admin.php');
    die;
}
$_SESSION['mensagem'] = $alertaUsuarioSenha;
header('Location: ../login.php');