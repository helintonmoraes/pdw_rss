<div class="container">
    <a class="btn btn-success"href="_config/settings.php">Configurações</a>
    <a class="btn btn-warning"href="database/crud/create-edit-noticia.php">Add Noticias</a>
    <a class="btn btn-warning"href="database/crud/create-edit-portal.php">Add Portal</a>
    <a class="btn btn-warning"href="listarTodas.php">Listar todas as noticias</a>
    <a class="btn btn-success" href="_rss/portalNoticias.xml"><img class="imgLink" src="_img/rss.png" alt=""/></a>

    <?php
    include 'cabecalho.php';
    require_once 'class/Noticias.class.php';


    $listaNoticias = new Noticias();
    
    $noticias = $listaNoticias->getNoticiasIndex();
    $listaNoticias->gerarRss($noticias);
    ?>


</div>
<hr/>
<?php foreach ($noticias->destaque as $destaque) : ?> 
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-xs-12 col-md-4" ><img src="_img/<?php echo $destaque->imagemDestaque->imagem ?>" width="300px" height="300px"></div>
                <div class="col-xs-6 col-md-8">
                    <?php
                    echo "<h1>" . $destaque->noticia->titulo . "</h1>";
                    echo $destaque->noticia->gravata;
                    ?>
                </div>
            </div>
        </div>

    </div>

<?php endforeach; ?>
<hr/>
<div class="container">


    <?php if (!@$_GET['pag']):; ?>
        <div class="row">
            <?php
            foreach ($noticias->todas as $noticia):
                $titulo = substr($noticia->titulo, 0, 50) . "...";
                ?>
                <div class="col-xs-6 col-md-2" >                 
                    <a href="destaque.php?destaque=<?php echo $noticia->id_noticia; ?>" class="thumbnail" style="height: 500px;">
                        <img src="_img/<?php echo $noticia->imagem; ?>"/>
                        <?php echo "<h3>$titulo</h3>"; ?>
                        <?php echo $noticia->gravata; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    else:
        $pag = $_GET['pag'];

        require_once "$pag.php";

    endif;
    ?>
</div>




