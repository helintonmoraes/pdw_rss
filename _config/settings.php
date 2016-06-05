<?php require_once '../cabecalho.php'; ?>

<div class="container">
    <a class="btn btn-danger"href="../index.php">Home</a>
    
    <h1>
        <a class="btn btn-success" href="../database/migration/migrate.php">migrate</a>
        <a class="btn btn-primary" href="../database/seeder/db:seedPortal.php">popular tabela Portal</a>
        <a class="btn btn-primary" href="../database/seeder/db:seedNoticias.php">popular tabela noticias</a>
        <a class="btn btn-primary" href="../database/seeder/db:seedComentarios.php">popular tabela comentarios</a>
        <a class="btn btn-primary" href="../database/seeder/db:seedImagem.php">popular tabela imagens</a>
        <a class="btn btn-danger" href="../database/migration/migrate:drop.php">reset</a>

    </h1>
    <h1>
        <a class="btn btn-success" href="../database/crud/create-edit-noticia.php">Adicionar Noticias</a>        
        <a class="btn btn-warning" href="../database/crud/create-edit-portal.php">Adicionar Portal</a>
    </h1>
</div>

<?php require_once '../rodape.php'; ?>