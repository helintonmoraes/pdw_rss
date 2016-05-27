<div class="container">
    <?php
    include 'cabecalho.php';
    require_once 'class/Noticias.class.php';
    $id = $_GET['destaque'];
    $destaque = new Noticias();
    $noticia = $destaque->getNoticiaDetalhes($id);
    if (!$_GET['img']) {
        $img = $noticia->img_dstq->imagem;
    } else {
        $img = $_GET['img'];
    }
    ?>
    <div class="">        
        <img src="_img/<?php echo $img ?>" style="margin: 0 auto; width: 1000px; height: 300px;filter: alpha(opacity=40)">
        <h3><?php echo($noticia->noticia->titulo) ?></h3>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <blockquote>
                <p><?php echo($noticia->noticia->conteudo) ?></p>
                <br/>
                <p><?php require_once 'carrocel.php';?></p>
            </blockquote>

        </div>
        <div class="col-md-3 col-md-pull-9">
            <?php foreach ($noticia->imagens as $imagem): ?>
                <a href="destaque.php?destaque=<?php echo$id; ?>&img=<?php echo($imagem->imagem); ?>">
                    <img src="_img/<?php echo($imagem->imagem); ?>" width="100px" height="100px;"/>                   
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <hr/>
    <h1>Comentarios</h1>
    <table class="table table-hover">
        <tr>
        <div class="row">
            <div class="col-md-9 col-md-push-3"><th>Email</th></div>
            <div class="col-md-3 col-md-pull-9"><th>Comentários</th></div>
        </div>

        </tr>
        <?php foreach ($noticia->comentarios as $item): ?>
            <tr>
            <div class="row">
                <div class="col-md-9 col-md-push-3"><td><?php echo $item->email; ?></td></div>
                <div class="col-md-3 col-md-pull-9"><td style="font-style: italic"><?php echo $item->comentario; ?></td></div>
            </div>

            </tr>
        <?php endforeach; ?>

    </table>


</div>





















<?php include_once 'rodape.php'; ?>
