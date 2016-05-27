<?php

class Migrate {

    function getConexao() {
        require_once '../../_config/conexao.inc.php';
        return $db;
    }

    function down() {
        $db = $this->getConexao();
        $query = $db->query("drop view vwNoticiasIndex");
        $query = $db->query("drop table comentarios");
        $query = $db->query("drop table imagens");
        $query = $db->query("drop table noticia");
        $query = $db->query("drop table portal");
        
        
    }

    function up() {
        $db = $this->getConexao();

//        //-------------------------------criar tabela portal--------------------
        $db->query("CREATE TABLE portal (id_portal integer PRIMARY KEY,nm_portal varchar, email varchar, site varchar );");

        $db->query("CREATE TABLE noticia (id_noticia integer PRIMARY KEY,link varchar,conteudo text,titulo varchar,data date,gravata varchar,id_portal integer,FOREIGN KEY(id_portal) REFERENCES portal (id_portal));");

        $db->query("CREATE TABLE imagens (id_imagem integer PRIMARY KEY, imagem varchar,destaque boolean, id_noticia integer, FOREIGN KEY(id_noticia) REFERENCES noticia (id_noticia));");

        $db->query("CREATE TABLE comentarios (id_comentario integer PRIMARY KEY,comentario text,email varchar,id_noticia integer,FOREIGN KEY(id_noticia) REFERENCES noticia (id_noticia));");

        $db->query("create view vwNoticiasIndex as
                    select noticia.titulo, noticia.gravata,noticia.id_noticia, noticia.data, imagens.imagem from noticia
                    inner join imagens on noticia.id_noticia = imagens.id_noticia 
                    where imagens.destaque = true
                    order by noticia.data desc"
        );
    }

}
