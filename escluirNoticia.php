<?php
require 'class/Noticia.class.php';


$noticia = new Noticia();
$noticia->delete($_GET['id_noticia']);

header("Location:listarTodas.php");

