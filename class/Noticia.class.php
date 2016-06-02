<?php

class Noticia {

    public $titulo;
    public $data;
    public $gravata;
    public $conteudo;

    function getConexao() {
        require_once '_config/conexao.inc.php';
        return $db;
    }

    function insert() {
        require_once 'Resposta.class.php';
        $resp = new Resposta();
        $db = $this->getConexao();
        $sql = $db->query("select max(id_noticia) as proximo from noticia");
        $id = $sql->fetch(PDO::FETCH_OBJ);
        $id->proximo++;
        $sql = $db->query("select titulo from noticia");
        while ($noticia = $sql->fetch(PDO::FETCH_OBJ)) {
            if ($noticia->titulo == $this->titulo) {
                $resp->mensagem = "O conteudo $this->site já foi cadastrado!!";
                $resp->status = false;
                return $resp;
            }
        }
        $link = "http://localhost/pdw_rss/destaque.php?destaque=$id->proximo";
        $id_portal = rand(0, 20);
        $sql = $db->query("insert into noticia(id_noticia,link,titulo,data,gravata,conteudo,id_portal)"
                . "values($id->proximo,'$link','$this->titulo','$this->data','$this->gravata','$this->conteudo',$id_portal)");
        $sql->fetch();
        $resp->mensagem = "O conteudo com o titulo $this->titulo foi cadastrado com sucesso!";
        $resp->status = true;
        return $resp;
    }

}
