<?php
require_once '../../cabecalho.php';
require_once '../../class/Imagens.class.php';
require_once '../../class/Noticias.class.php';
$img = new Imagens();
$ntc = new Noticias();
$noticia = $ntc->getNoticiaFormImg($_GET['id_noticia']);
$img->setId_noticia($_GET['id_noticia']);
?>
<div class="container">
    <a class="btn btn-danger"href="../../index.php">Home</a>
    <a href="listar-noticias.php">Voltar</a>

    <form method="post" enctype="multipart/form-data" action="../../recebeArquivo.php">
        <div class="form-group">
            <hr/>
            <?php echo "<h1>" . $noticia->noticia->titulo . "</h1>"; ?>
            <a class="btn btn-primary"href="definir-img-destaque.php?id_noticia=<?php echo $_GET['id_noticia'] ?>">Definir imagem destaque</a>

            <hr/>
            <label for="exampleInputEmail1">Selecione uma Imagem</label>
            <p><input name="arquivo" type="file" /></p>
            <input type="hidden" name="id_noticia" value="<?php echo $img->getId_noticia(); ?>"/>
            <p><input type="submit" value="Salvar" /></p>
        </div>
        <?php foreach ($noticia->imagens as $imagem) : ?>
            <img  src="../../_img/<?php echo $imagem->imagem; ?>" width="100px" height="100px"/>
        <?php endforeach; ?>
    </form>




</div>
