<?php

class Imagens {

    public $id_noticia;

    function setId_noticia($id) {
        $this->id_noticia = $id;
    }

    function getId_noticia() {
        return $this->id_noticia;
    }

    function getConexao() {
        require_once '_config/conexao.inc.php';
        return $db;
        
    }

    function setImgDestaque( $db,$id_noticia, $id_imagem) {
       
        
        $query = "UPDATE imagens SET destaque = 'true' WHERE id_noticia = $id_noticia and id_imagem = $id_imagem";
        $this->sql($db,$query);
        
    }

    function insert($nomeImagem) {
        $db = $this->getConexao();
        $consulta = $db->query("select max(id_imagem) as id_imagem from imagens");
        $img = $consulta->fetch(PDO::FETCH_OBJ);
        $id = $img->id_imagem + 1;
        $id_noticia = $this->getId_noticia();

        $insert = $db->query("insert into imagens (id_imagem, imagem, destaque, id_noticia) values ($id,'$nomeImagem', 'f', $id_noticia)");
        $insert->fetch();
    }

    function getImagemDestaque($id) {
        $db = $this->getConexao();
        $imagem = $db->query("select * from imagens where id_noticia = $id limit 1");
        $resp = $imagem->fetch(PDO::FETCH_OBJ);
        return $resp->imagem;
    }

    function sql($db,$query) {
       $sql = $db->query($query);
       $sql->fetch();     
    }

}
