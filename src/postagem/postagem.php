<?php 
$tituloPagina = "Página de Postagem";
require_once __DIR__ . "/../header.php";
 ?>
    <div class='container'>
        <form action="./publicar.php" id='publicacao' class='container' method="post">
            <label>Titulo:</label><br><input id="campos" name='titulo' required><br><br>
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='texto' required></textarea>
            </div>
            <button type="submit" id="botao" class="btn btn-dark">Publicar</button>
        </form>
    </div>
<?php require_once __DIR__ . "/../footer.php"; ?>