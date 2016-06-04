<?php
require_once '../../cabecalho.php';
require_once '../../class/Noticias.class.php';
require_once '../../class/Feedback.class.php';
$consulta = new Noticias();
$noticias = $consulta->listarNoticias();
?>
<div class="container">
    <table class="table table-hover">
        <div class="panel-heading">
            <h1>Adicionar Imagens... Selecione a noticia!!!</h1>
        </div>
        <?php
        $a = new Feedback();
        $a->getFeedback(serialize($noticias));
        ?>
        <tr>
            <th>Data</th>
            <th>Título</th>
            <th>Adicionar<div class="glyphicon glyphicon-open"/></th>
        </tr>
        <?php foreach ($noticias->valorRetorno as $noticia): ?>
            <a href="#">
                <tr>
                    <td class="col-xs-6 col-sm-3"><?php echo $noticia->data; ?></td>
                    <td class="col-xs-12 col-sm-6 col-md-8"><?php echo substr($noticia->titulo, 0, 80) . "..."; ?></td>
                    <td class="col-xs-6 col-sm-3"><a class="glyphicon glyphicon-picture"href="create-edit-imagem.php?id_noticia=<?php echo $noticia->id_noticia; ?>"></a></td>
                </tr>
            </a>
        <?php endforeach; ?>

    </table>
</div>