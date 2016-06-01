<?php
class Imagens{
    
    function getConexao() {
        require_once '_config/conexao.inc.php';
        return $db;
    }
    
    function getImagemDestaque($id){
        $db = $this->getConexao();
        $imagem = $db->query("select * from imagens where id_noticia = $id limit 1");
        $resp = $imagem->fetch(PDO::FETCH_OBJ);
        return $resp->imagem;
    }
}
