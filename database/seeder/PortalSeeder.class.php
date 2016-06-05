<?php

class PortalSeeder {

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

        foreach (range(0, 20) as $id) {
            
            $id_portal = $id;
            $nm_portal = "nome_do_portal: $id";
            $email = "email@do.portal.$id";
            $site = "www.sitedoportal$id.com.br";
            
            //-----------------------------------------------------------------------------
            $query = $db->query("insert into portal(id_portal,nm_portal,email,site)"
                    . " values ($id_portal,'$nm_portal','$email','$site');");
        }
    }

}

//$query=$db->prepare("Select * from ?");
//$query->excute(array($myinsecuredata));