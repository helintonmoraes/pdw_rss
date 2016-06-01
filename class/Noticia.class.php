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
        $db = $this->getConexao();
        $sql = $db->query("select max(id_noticia) as maior_id from noticia");
        $id = $sql->fetch(PDO::FETCH_OBJ);
        $id_noticia = $id->maior_id + 1;
        $sql = $db->query("insert into noticia(id_noticia,titulo,data,gravata,conteudo)"
                . "values($id_noticia,'$this->titulo','$this->data','$this->gravata','$this->conteudo')");
        $sql->fetch();
    }

}
