<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost:8080/registrar.php">Densetsu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8080/admin.php">Painel de Administrador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8080/postagem/postagem.php">Nova postagem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8080/postagem/lista.php">Lista de Postagens</a>
            </li>
        </ul>
        <?php
        if ($tituloPagina == "Página de Login") {
            echo "<a href=http://localhost:8080/registrar.php><button type='button' id='botaoSair' class='btn btn-dark' >Cadastro</button></a>";
        } elseif ($tituloPagina == "Página de Cadastro") {
            echo "<a href=http://localhost:8080/login.php><button type='button' id='botaoSair' class='btn btn-dark' >Login</button></a>";
        } else {
            echo "<a href=http://localhost:8080/admin/logout.php><button type='button' id='botaoSair' class='btn btn-dark' >Sair</button></a>";
        }

        ?>
    </div>
</nav>