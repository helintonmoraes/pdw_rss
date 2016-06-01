<?php

class NoticiasSeeder {

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

    function getData() {
        $dia = rand(01, 19);
        if ($dia < 10) {
            $dia = "0" . $dia;
        }
        $data = "2016-05-$dia";
        return $data;
    }

    function getLink() {
        $id = $this->getId();
        $link = "http://localhost/pdw_rss/destaque.php?destaque=$id";
        return $link;
    }

    //--------------------------------------------------------------------------
    function seed() {
        $db = $this->getConexao();
        $gerador = $this->getGerador();

        foreach (range(0, 80) as $id) {
            $this->setId($id);
            $conteudo = $gerador->getConteudo();
            $titulo = $gerador->getParagrafos();            
            $gravata = substr($conteudo, 0, 200);
            $data = $this->getData();
            $link = $this->getLink();
            $id_portal = rand(0, 20);
            //-----------------------------------------------------------------------------
            $query = $db->query("insert into noticia(id_noticia,link,conteudo,titulo,data,gravata,id_portal) values ($id,'$link','$conteudo','$titulo','$data','$gravata',$id_portal);");
        }
    }

}

//$query=$db->prepare("Select * from ?");
//$query->excute(array($myinsecuredata));