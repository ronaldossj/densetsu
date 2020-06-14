<?php
session_start();
require_once __DIR__. "/../menu.html";
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
            <button type='submit' class="btn btn-dark">Enviar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>