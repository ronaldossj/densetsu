<?php
session_start();
require_once __DIR__ . "/../../pdo.php";
$id = $_GET['id'];
$idPagina = $_GET['idPagina'];
$sql = "SELECT id, usuario_id, idPostagem, dataComentario, comentario FROM comentario WHERE id = '$id'";
$comentario = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

$tituloPagina = "Editar comentário";

require_once __DIR__ . "/../../header.php"; 
?>

    <div class="container" id='lista'>
    <?php echo "<a href=./../publicacao.php?id=" . $idPagina . "><small><--- Voltar</small></a>" ?>  
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
               <?php echo "<form action=./comentarioEditado.php?id=".$id."&idPagina=".$idPagina." method=post> ";?>
            </div>
            <textarea rows="30" cols="150" name=comentario required><?php echo $comentario['comentario'] ?> </textarea>
            <button type='submit' id='botao' class="btn btn-dark">Enviar</button>
            </form>
        </div>
    </div>
<?php require_once __DIR__ . "/../../footer.php"; ?>