<?php
include 'cabecalho.php';
require_once 'class/Noticias.class.php';


$listaNoticias = new Noticias();
$noticias = $listaNoticias->getNoticiasIndex();
?>

<div class="jumbotron" >
    <div class="container">
        <?php foreach ($noticias->destaque as $destaque) : ?>        
            <?php
            echo "<h1>$destaque->titulo</h1>";
            echo $destaque->gravata;
            ?>
        <?php endforeach; ?>
    </div> 
</div>
<div class="container">
    <?php if (!$_GET['pag']):; ?>
        <div class="row">
            <?php foreach ($noticias->todas as $noticia):
                $titulo = substr($noticia->titulo, 0, 50) . "...";
                ?>
                <div class="col-xs-6 col-md-3" >
                    
                    
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




