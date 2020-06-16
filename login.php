<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: ./admin.php');
    }
    require_once __DIR__. "/helpers.php";
    $tituloPagina = "Página de Login";
?>
<?php require_once __DIR__ . "/header.php"; ?>
    <?php
        if(isset($_SESSION['mensagem'])){
            exibeAlerta();
        }
    ?>
    <form action="./admin/login.php" method="post" id='formularios'>
    <label>Usuario:</label><br><input type='text' name='usuario' require><br>
    <label>Senha:</label><br><input type='password'  name='senha' require><br>
    <button type='submit' class="btn btn-dark" id="botao">Login</button>
    <a href="/registrar.php">Ainda não tenho cadastro.</a>
    </form>
<?php require_once __DIR__ . "/footer.php"; ?>
