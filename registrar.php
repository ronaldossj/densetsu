<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Densetsu</title>
</head>
<body>
    <?php 
        session_start();
        echo (isset($_SESSION['status'])) ? $_SESSION['status'] : '';
    ?>
    <form action='./admin/usuario/registrar.php' method="POST">
        <label>E-mail:</label><input name='email' type='email' required><br>
        <label>Usuário:</label><input name='usuario' type='text' required><br>
        <label>Senha:</label><input name='senha' type='password' required><br>
        <label>Nome:</label><input name='nome' type='text'><br>
        <button type='submit'> Cadastrar </button>
    </form>
</body>
</html>