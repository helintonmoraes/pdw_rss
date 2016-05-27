<?php

class ComentariosSeeder {

    public $id;

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    //--------------------------------------------------------------------------

    function getGerador() {
        require_once"../classes/Loren.class.php";
        $gerador = new GeradorTexto();
        return $gerador;
    }

    function getConexao() {
        require_once '../../_config/conexao.inc.php';
        return $db;
    }

    //--------------------------------------------------------------------------

    

    

    //--------------------------------------------------------------------------
    function seed() {
        $db = $this->getConexao();
        $gerador = $this->getGerador();

        foreach (range(0, 500) as $id) {
            
            $comentario = $gerador->getParagrafos();
            $email = "abcdef@oi.br";
            $id_noticia = rand(0, 80);
           
            //-----------------------------------------------------------------------------
            $query = $db->query("insert into comentarios(id_comentario,comentario,email,id_noticia) values ($id,'$comentario','$email',$id_noticia);");
        }
    }

}

//$query=$db->prepare("Select * from ?");
//$query->excute(array($myinsecuredata));