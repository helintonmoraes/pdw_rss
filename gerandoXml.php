<?php

require_once 'class/Noticias.class.php';


$listaNoticias = new Noticias();
$noticias = $listaNoticias->getNoticiasIndex();



$arquivo = '<?xml version="1.0" encoding="iso-8859-1"?>';
$arquivo .= '<rss version="2.0">';
$arquivo .= "<channel>";
$arquivo .= "<title>Portal | Noticias - Você com contúdo</title>";
$arquivo .= "<description>Trabalho da materia PDW- prof Tormen</description>";
$arquivo .= "<link>http://localhost/pdw_rss/</link>";
$arquivo .= "<language>pt-br</language>";

//var_dump($noticias);
$corpo = "";
foreach ($noticias->todas as $noticia) {
    $corpo .= "<item>";
    $corpo .= "<title>$noticia->titulo</title>";
    $corpo .= "<description>$noticia->conteudo</description>";
    $corpo .= "<link>$noticia->link</link>";
    $corpo .= "</item>";
}

$rss = $arquivo.$corpo;

$rss .= "</channel></rss>";

$arq = fopen("_rss/portalNoticias.xml","w+"); 

fwrite($arq,$rss); 
fclose($arq); 