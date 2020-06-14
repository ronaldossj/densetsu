<?php
require_once __DIR__ . "/helpers.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Densetsu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/../stylesheet.css" />
</head>

<body>
    <?php
    session_start();
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
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>