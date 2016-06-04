<div class="container">
    <a class="btn btn-danger"href="../../index.php">Home</a>
    <a class="btn btn-warning"href="create-edit-imagem.php?id_noticia=<?php echo $_GET['id_noticia']; ?>">Voltar</a>
    <h1>Escolha a imagem destaque da noticia:</h1>
    <?php
    require_once '../../cabecalho.php';

    require_once '../../class/Noticias.class.php';

    $ntc = new Noticias();
    $noticia = $ntc->getNoticiaFormImg($_GET['id_noticia']);
    echo "<h4>" . $noticia->noticia->titulo . "</h4>";
    ?>
    <form method="post" >

        <?php foreach ($noticia->imagens as $imagem) : ?>
            <div style="display: block; float: left;padding: 15px;">
                <img  src="../../_img/<?php echo $imagem->imagem; ?>" width="100px" height="100px"/><br/>
                <input type="radio" name="destaque" value="<?php echo $imagem->id_imagem; ?>"/>
                <input type="hidden" name="id_noticia" value="<?php echo @$_GET['id_noticia']; ?>"/>
            </div>
        <?php endforeach; ?>
        <p style="clear: both;"><input type="submit"/></p>

    </form>
</div>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once '../../class/Imagens.class.php';
    echo  $_POST['destaque'];
    echo $_POST['id_noticia'];
}