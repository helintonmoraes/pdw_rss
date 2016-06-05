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
        $this->gravata = substr($this->conteudo, 0,200);
        $id_portal = rand(0, 20);
        $sql = $db->query("insert into noticia(id_noticia,link,titulo,data,gravata,conteudo,id_portal)"
                . "values($id->proximo,'$link','$this->titulo','$this->data','$this->gravata','$this->conteudo',$id_portal)");
        $sql->fetch();
        $resp->mensagem = "O conteudo com o titulo $this->titulo foi cadastrado com sucesso!";
        $resp->status = true;
        return $resp;
    }

    function getNoticia($id) {
        require_once '../../_config/conexao.inc.php';
        $id = (int) $id;
        $sql = $db->query("select * from noticia where id_noticia = $id");
        $resp = $sql->fetch(PDO::FETCH_OBJ);
        return $resp;
    }

    function delete($id_noticia) {
        $db = $this->getConexao();
        $id_noticia = (int) $id_noticia;

        $query = "delete  from imagens where id_noticia = $id_noticia";
        $sql = $db->query($query);
        $sql->fetch();
        $query = "delete  from comentarios where id_noticia = $id_noticia";
        $sql = $db->query($query);
        $sql->fetch();
        $query = "delete  from noticia where id_noticia = $id_noticia";
        $sql = $db->query($query);
        $sql->fetch();
    }

    function update($post) {
        require_once 'Resposta.class.php';
        $id_noticia = (int) $post['id_noticia'];
        $link = $post['link'];
        $conteudo = $post['conteudo'];
        $titulo = $post['titulo'];
        $data = $post['data'];
        $gravata = $post['gravata'];
       
        $db = $this->getConexao();
        $sql = $db->query("update noticia set link = '$link', conteudo = '$conteudo', titulo = '$titulo', data = '$data' ,gravata = '$gravata' where id_noticia = $id_noticia");
        
        $sql->fetch();
        $resp = new Resposta();
        $resp->status = true;
        $resp->mensagem = "Conteudo alterado com sucesso!";
        return $resp;
        
    }

}
