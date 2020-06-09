<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Densetsu</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
</head>
<body>
    <?php 
        session_start();
        echo (isset($_SESSION['status'])) ? $_SESSION['status'] : '';
    ?>
    <form id='formularios' class='container' action='./admin/usuario/registrar.php' method="POST">
            <label>E-mail:</label><input id='campos' name='email' type='email' ><br>
            <label>Usuário:</label><input id='campos' name='usuario' type='text' required><br>
            <label>Senha:</label><input id='campos' name='senha' type='password' required><br>
            <label>Nome:</label><input id='campos' name='nome' type='text'><br>
            <button class="bt" type='submit'> Cadastrar </button>
    </form>

</body>
</html>