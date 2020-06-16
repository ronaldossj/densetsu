<?php
session_start();

require_once __DIR__ . "/../db.php";
$id = $_GET['id'];
$sql = "SELECT id, titulo, texto FROM postagens WHERE id = '$id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $publicacao = $result->fetch_assoc();
}
$sqlComentario = "SELECT c.id, comentario, dataComentario, usuario_id, idPostagem, u.nome as autorComentario FROM comentario as c LEFT JOIN usuarios as u ON (c.usuario_id = u.id) WHERE idPostagem = '$id'";
$tituloPagina = $publicacao['titulo'];
$comentarios = [];
$resultComentario = $db->query($sqlComentario);
if ($resultComentario->num_rows > 0) {
    $comentarios = $resultComentario->fetch_all(MYSQLI_ASSOC);
}
?>

<?php require_once __DIR__ . "/../header.php"; ?>
    <div class="container" id='lista'>
    <?php echo "<a href=./lista.php><small><--- Voltar</small></a>"; ?>
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h1 class="mb-1"><span><?php echo $publicacao['titulo']; ?> </span> </h1>
                <small><?php echo "<a href=./editarPostagem.php?id=" . $id . "><small>Editar postagem</small></a>" ?></small>
            </div>
            <?php echo $publicacao['texto'] ?>
        </div>
    </div>
    <form action='./comentario/comentario.php' id='comentario' class='container' method="post"><br>
        <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='comentario' required></textarea>
        </div>
        <button type="submit" id="botao" class="btn btn-dark">Publicar Comentário</button>
        <?php echo "<input name='idPublicacao' type='hidden' readonly=true value=" . $id . ">"; ?>
    </form>
    <?php foreach ($comentarios as $key => $comentario) : ?>
        <?php
        $idComentario = $comentarios[$key]['id'];
        $data = $comentarios[$key]['dataComentario'];
        ?>
        <div class="container" id='lista'>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <?php echo  "<p class=mb-1>" . $comentario['comentario'] . "</p>"; ?>
                    <small><?php echo $data; ?></small>
                </div>
                <small><span>Autor: <?php echo $comentario['autorComentario']; ?> </spsan> </small>
                <?php echo "<a href=./comentario/editarComentario.php?id=" . $idComentario . "&idPagina=".$id."><small> - Editar comentário</small></a>" ?>
                <?php echo "<a href=./comentario/deletarComentario.php?id=" . $idComentario . "&idPagina=".$id."><small> - Deletar comentário</small></a>" ?>
            </div>
        </div>

    <?php endforeach; ?>
    <?php require_once __DIR__ . "/../footer.php"; ?>