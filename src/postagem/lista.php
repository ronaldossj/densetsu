<?php
session_start();
$tituloPagina = "Lista de Postagem";
require_once __DIR__ . "/../pdo.php";
require_once __DIR__. "/../helpers/dbHelper.php";

$sql = gerarSelect("p.id, u.nome as autor, p.dataPublicacao, p.titulo ", "postagens as p LEFT JOIN usuarios as u ON (p.autor=u.id)", '1=1' );
$postagens = $pdo->query($sql)->fetchAll(PDO::FETCH_BOTH);


require_once __DIR__ . "/../header.php";
?>
    <?php foreach ($postagens as $key => $postagem) : ?>
        <?php
        $idLink = $postagens[$key]['id'];
        $data = $postagens[$key]['dataPublicacao'];
        ?>
        <div class="container" id='lista'>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><span><?php echo $postagem['titulo']; ?> </span> </h5>
                    <small><?php echo $data; ?></small>
                </div>
                <?php echo  "<a href=./publicacao.php?id=".$idLink."><p class=mb-1>Continue a ler...</p></a>" ?>
                <small><span>Autor: <?php echo $postagem['autor']; ?> </span> </small>
                <?php echo "<a href=./editarPostagem.php?id=" . $idLink . "><small> - Editar postagem</small></a>" ?>
                <?php echo "<a href=./postagemDeletada.php?id=" . $idLink . "><small> - Deletar postagem</small></a>" ?>
            </div>
        </div>

    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>