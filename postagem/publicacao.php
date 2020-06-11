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
                <h1 class="mb-1"><span><?php echo $publicacao['titulo']; ?> </span> </h1>
            </div>
            <?php echo $publicacao['texto'] ?>
        </div>
    </div>
</body>

</html>