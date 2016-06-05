<?php

class Noticias {

    public $destaque;
    public $imgDestaque;
    public $todas = [];

    function getConexao() {
        require_once '_config/conexao.inc.php';
        return $db;
    }

    function getNoticiasIndex() {

        $db = $this->getConexao();
        //-------------------aqui pego a noticia mais nova para exibi-la no jumbotron
        $destaques = $db->query("select * from vwNoticiasIndex  order by data desc limit 1");
        $arrayDestaques = [];
        while ($noticia = $destaques->fetch(PDO::FETCH_OBJ)) {
            $jumbotron = new Jumbotron();
            $jumbotron->noticia = $noticia;
            $imagens = $db->query("select imagem,destaque from imagens where id_noticia = $noticia->id_noticia and destaque = 'true' limit 1");
            while ($imagem = $imagens->fetch(PDO::FETCH_OBJ)) {
                $jumbotron->imagemDestaque = $imagem;
            }
            $arrayDestaques[] = $jumbotron;
        }


//------------------------aqui pego todas as noticias do portal para exibi-la no index  -----------------------------------------------------
        $noticias = $db->query("select * from vwNoticiasIndex");
        $arrayNews = [];
        while ($noticia = $noticias->fetch(PDO::FETCH_OBJ)) {
            $arrayNews[] = $noticia;
        }
//----------------------------------------------------------------------------
        $this->todas = $arrayNews;
        $this->destaque = $arrayDestaques;


        return $this;
    }

    function getNoticiaDetalhes($id) {
        $db = $this->getConexao();
        $detalhesNoticia = new DetalhesNoticia();
//--------------------pegando os detalhes da noticia------------
        $sql = $db->query("select * from noticia where id_noticia = $id");
        $detalhesNoticia->noticia = $sql->fetch(PDO::FETCH_OBJ);

//-------------------pegando os comentarios da noticia e armazeno todos em um array
        $comentarios = [];
        $sql = $db->query("select * from comentarios where id_noticia = $id");
        while ($comentario = $sql->fetch(PDO::FETCH_OBJ)) {
            $comentarios[] = $comentario;
        }
//------------------atribuo o array de comentarios no atributo comentarios do obj
        $detalhesNoticia->comentarios = $comentarios;

//------------------pegando todos os nomes das imagens da noticia referida-----
        $imagens = [];
        $sql = $db->query("select  imagem from imagens where id_noticia = $id");
        while ($imagem = $sql->fetch(PDO::FETCH_OBJ)) {
            $imagens[] = $imagem;
        }
        $detalhesNoticia->imagens = $imagens;
//---------------------------------------pego a quantidade de imagens----------
        $sql = $db->query("select count(id_noticia) from imagens where id_noticia = $id");
        $detalhesNoticia->qtd_img = $sql->fetch(PDO::FETCH_OBJ);

        $sql = $db->query("select imagem from imagens where destaque = true and id_noticia = $id");
        $detalhesNoticia->img_dstq = $sql->fetch(PDO::FETCH_OBJ);



        return $detalhesNoticia;
    }

    function listarNoticias() {
        require_once '../../_config/conexao.inc.php';
        require_once 'Resposta.class.php';
        $resp = new Resposta();

        $sql = $db->query("select id_noticia, data, titulo from noticia order by data desc limit 20");
        $array = [];
        while ($noticias = $sql->fetch(PDO::FETCH_OBJ)) {
            $array[] = $noticias;
        }


        $resp->mensagem = "Noticias Cadastradas:";
        $resp->status = true;
        $resp->valorRetorno = $array;

        return $resp;
    }

    function getNoticiaFormImg($id) {
        $resp = new DetalhesNoticia();
        require_once '../../_config/conexao.inc.php';
        $consulta = $db->query("select titulo, id_noticia from noticia where id_noticia = $id");
        $noticia = $consulta->fetch(PDO::FETCH_OBJ);
        $resp->noticia = $noticia;

        $array = [];
        $resp->img_dstq = false;
        $consulta = $db->query("select * from imagens where id_noticia = $id");
        while ($imagens = $consulta->fetch(PDO::FETCH_OBJ)) {
            $array[] = $imagens;
            if ($imagens->destaque) {
                $resp->img_destaque = true;
            }
        }
        $resp->imagens = $array;
        return $resp;
    }

    function getNoticiaFormDestaque($db, $id) {
        $resp = new DetalhesNoticia();

        $consulta = $db->query("select titulo, id_noticia from noticia where id_noticia = $id");
        $noticia = $consulta->fetch(PDO::FETCH_OBJ);
        $resp->noticia = $noticia;

        $array = [];
        $resp->img_dstq = false;
        $consulta = $db->query("select * from imagens where id_noticia = $id");
        while ($imagens = $consulta->fetch(PDO::FETCH_OBJ)) {
            $array[] = $imagens;
            if ($imagens->destaque) {
                $resp->img_destaque = true;
            }
        }
        $resp->imagens = $array;
        return $resp;
    }

    function gerarRss($noticias) {


        $arquivo = '<?xml version="1.0" encoding="utf-8"?>';
        $arquivo .= '<rss version="2.0">';
        $arquivo .= "<channel>";
        $arquivo .= "<title>Portal | Noticias - Você com contúdo</title>";
        $arquivo .= "<description>Trabalho da materia PDW- prof Tormen</description>";
        $arquivo .= "<link>http://localhost/pdw_rss/_rss/portalNoticias.xml</link>";
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

        $rss = $arquivo . $corpo;

        $rss .= "</channel></rss>";

        $arq = fopen("_rss/portalNoticias.xml", "w+");

        fwrite($arq, $rss);
        fclose($arq);
    }

//------------------
}

class DetalhesNoticia {

    public $noticia;
    public $comentarios;
    public $imagens;
    public $qtd_img;
    public $img_dstq;

}

class Jumbotron {

    public $noticia;
    public $imagemDestaque;

}
