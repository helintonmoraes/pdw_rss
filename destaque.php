<div class="container">
    <?php
    session_start();
    require_once 'class/Feedback.class.php';
    $a = "";
    include 'cabecalho.php';
    require_once 'class/Noticias.class.php';
    $id = $_GET['destaque'];
    $_SESSION['insert_comment'] = $id;
    $destaque = new Noticias();
    $noticia = $destaque->getNoticiaDetalhes($id);
    if (!@$_GET['img']) {
        $img = $noticia->img_dstq->imagem;
    } else {
        $img = $_GET['img'];
    }
    ?>
    <a class="btn btn-danger"href="index.php">Home</a>
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
                <p><?php require_once 'carrocel.php'; ?></p>
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
    <?php
    if (isset($_GET['r'])) {
        $a = new Feedback();
        $a->getFeedback($_GET['r']);
    } else {
        echo $a;
    }
    ?>
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
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="request.php" method="post">
                    <input type="hidden" name="class" value="Comentarios"/>
                    <input type="hidden" name="id_noticia" value="<?php echo $_GET['destaque'] ?>"/>


                    <label>Comentar notícia</label>
                    <div class="form-group input-group">

                        <span class="input-group-addon">@</span>
                        <input type="text" name="email" class="form-control" placeholder="e-mail">
                    </div>
                    <div class="form-group">

                        <textarea class="form-control" name="comentario"rows="4" placeholder="Digite aqui"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Comentar</button>
                    <button type="reset" class="btn btn-default">Limpar</button>
                </form>
            </div>


        </div>

    </div>
</div>






















<?php include_once 'rodape.php'; ?>
