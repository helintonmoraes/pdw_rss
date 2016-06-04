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
        $destaques = $db->query("select * from vwNoticiasIndex  order by data desc limit 1");
        $arrayDestaques = [];
        while ($noticia = $destaques->fetch(PDO::FETCH_OBJ)) {
//$noticia->imgDestaque = $this->getImagemDestaque($noticia->id_noticia);
            $arrayDestaques[] = $noticia;
        }
//-----------------------------------------------------------------------------
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
        while ($imagens = $consulta->fetch(PDO::FETCH_OBJ)){
            $array[] = $imagens;
            if($imagens->destaque){
                $resp->img_destaque = true;
            }
        }       
        $resp->imagens = $array;
        return $resp;
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
