<?php
session_start();
require_once __DIR__ . "/../db.php";
$id = $_GET['id'];
$sql = "SELECT id, titulo, texto FROM postagens WHERE id = '$id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $publicacao = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $publicacao['titulo'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/../stylesheet.css" />
</head>

<body>
    <div class="container" id='lista'>
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
               <?php echo "<form action=./postagemEditada.php?id=".$id." method=post> ";?>
                <h1 class="mb-1"><?php echo  "<input type=text name=titulo value=".$publicacao['titulo']." required>"; ?> </h1>
            </div>
            <textarea rows="30" cols="150" name=texto required><?php echo $publicacao['texto'] ?> </textarea>
            <button type='submit'>Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>