<?php
require_once __DIR__ . "/helpers.php";
session_start();
if(isset($_SESSION['usuario'])){
    header('Location: ./admin.php');
}
$tituloPagina = "Página de Cadastro";
?>

<?php require_once __DIR__ . "/header.php"; ?>
    <?php
    if (isset($_SESSION['mensagem'])) {
        exibeAlerta();
    }
    ?>
    <form id='formularios' class='container' action='./admin/usuario/registrar.php' method="POST">
        <label>E-mail:</label><input id='campos' name='email' type='email' ><br>
        <label>Usuário:</label><input id='campos' name='usuario' type='text' required><br>
        <label>Senha:</label><input id='campos' name='senha' type='password' required><br>
        <label>Nome:</label><input id='campos' name='nome' type='text'><br>
        <button class="btn btn-dark" type='submit' id='botao'> Cadastrar </button>
        <a href="login.php">Já tenho cadastro</a>
    </form>
<?php require_once __DIR__ . "/footer.php"; ?>
