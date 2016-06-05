<!-- Aqui eu recebo o arquivo de imagem quando mando salvar pelo formulario de inserção de imagens-->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'class/Imagens.class.php';

    $img = new Imagens();
    $img->setId_noticia($_POST['id_noticia']);
    $id_noticia = $img->getId_noticia();

    // faço inserção do arquivo no diretório de imagens
    $nomeDaImagem = $_FILES['arquivo']['name'];
    $destino = '_img/' . $nomeDaImagem;
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $destino);

    $img->insert($nomeDaImagem);
    header("Location:database/crud/create-edit-imagem.php?id_noticia=$id_noticia");
}