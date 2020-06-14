<?php
session_start();
require_once __DIR__."/../menu.html";
require_once __DIR__ . "/../db.php";
$id = $_GET['id'];
$sql = "SELECT id, titulo, texto FROM postagens WHERE id = '$id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $publicacao = $result->fetch_assoc();
}
$sqlComentario = "SELECT comentario, dataComentario, usuario_id, idPostagem FROM comentario WHERE idPostagem = '$id'";

$comentarios = [];
$resultComentario = $db->query($sqlComentario);
if ($resultComentario->num_rows > 0) {
    $comentarios = $resultComentario->fetch_all(MYSQLI_ASSOC);
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
    <form action='./comentario/comentario.php' id='comentario' class='container' method="post"><br>
        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='comentario' required></textarea>
        </div>
        <button type="submit" id="botao" class="btn btn-dark">Publicar Comentário</button>
        <?php echo "<label>Número da Publicação:  </label><input name='idPublicacao' readonly=true value=".$id.">"; ?>
    </form>
    <?php foreach ($comentarios as $key => $comentario) : ?>
        <?php 
        $idLink = $comentarios[$key]['idPostagem'];
        $data = $comentarios[$key]['dataComentario'];
        ?>
        <div class="container" id='lista'>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><span> </span> </h5>
                    <small><?php echo $data; ?></small>
                </div>
                <?php echo  "<p class=mb-1>".$comentario['comentario']."</p>"; ?>
                <small><span>Autor: <?php echo $comentario['usuario_id']; ?> </spsan> </small>
                <?php echo "<a href=#id=" . $idLink . "><small> - Editar comentário</small></a>" ?>
                <?php echo "<a href=#?id=" . $idLink . "><small> - Deletar comentário</small></a>" ?>
            </div>
        </div>

    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>