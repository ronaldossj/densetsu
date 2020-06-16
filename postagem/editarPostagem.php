<?php
session_start();
require_once __DIR__ . "/../pdo.php";
$id = $_GET['id'];
$sql = "SELECT id, titulo, texto FROM postagens WHERE id = '$id'";
$publicacao = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
$tituloPagina = "Editar: " . $publicacao['titulo'];

require_once __DIR__ . "/../header.php";
?>
<div class="container" id='lista'>
    <?php echo "<a href=./publicacao.php?id=" . $id . "><small><--- Voltar</small></a>" ?>
    <div class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <?php echo "<form action=./postagemEditada.php?id=" . $id . " method=post> "; ?>
            <h1 class="mb-1"><?php echo  "<input type=text name=titulo value=".$publicacao['titulo']." required>"; ?> </h1>
        </div>
        <textarea rows="30" cols="150" name=texto required><?php echo $publicacao['texto'] ?> </textarea>
        <button type='submit' id='botao' class="btn btn-dark">Enviar</button>
        </form>
    </div>
</div>
<?php require_once __DIR__ . "/../footer.php"; ?>