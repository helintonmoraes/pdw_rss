<a href="database/crud/create-edit-noticia.php"></a>
<?php
require_once 'class/Noticia.class.php';
$consulta = new Noticia();


$resp = $consulta->update($_POST);
$r = serialize($resp);
$id_noticia = $_POST['id_noticia'];
header("Location:database/crud/create-edit-noticia.php?r=$r&id_noticia=$id_noticia");