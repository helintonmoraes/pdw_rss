<?php
require_once 'cabecalho.php';
require_once 'class/Noticias.class.php';
$listaNoticias = new Noticias();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $noticias = $listaNoticias->getNoticiasBusca();
}
else{
    $noticias = $listaNoticias->getNoticiasIndex();
}
//var_dump($noticias);
?>

<div class="container">
    <a class="btn btn-danger"href="index.php">Home</a>
    <form method="POST" action="">
        <input class="form-control" style="float:left;width:60%" type="text" name="filtro" placeholder="Buscar Notícia">
        <input class="form-control"style="float:left;width:10%;"type="submit" value="Procurar">
    </form>
    <table class="table table-hover">
        <tr>
            <th>Imagem</th>            
            <th>Titulo</th>
            <th>Conteudo</th>
            <th>Editar</th>
        </tr>

        <?php
        foreach ($noticias->todas as $noticia):
            $titulo = substr($noticia->titulo, 0, 15) . "...";
            ?>
            <tr>
            <div class="row">
                <td class="col-md-1"><img src="_img/<?php echo $noticia->imagem; ?>" width="30px" height="30px"/></td>
                <td class="col-md-2"><?php echo $titulo; ?></td>

                <td><?php echo substr($noticia->conteudo, 0, 150); ?></td>
                <td class="col-md-1">
                    <a class="glyphicon glyphicon-pencil"href="database/crud/create-edit-noticia.php?id_noticia=<?php echo $noticia->id_noticia?>"></a>
                    <a class="glyphicon glyphicon-trash"href="escluirNoticia.php?id_noticia=<?php echo $noticia->id_noticia?>"></a>
                </td>
                </th>
            </div>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
