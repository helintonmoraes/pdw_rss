<?php

class Portal {

    public $nm_portal;
    public $email;
    public $site;

    function getConexao() {
        require '_config/conexao.inc.php';
        return $db;
    }

    function insert() {
        require_once 'Resposta.class.php';
        $resp = new Resposta();
        $db = $this->getConexao();
        $sql = $db->query("select max(id_portal) as max from portal");
        $id_portal = $sql->fetch(PDO::FETCH_OBJ);
        $id_portal->max++;
        $sql = $db->query("select site from portal");
        while ($Site = $sql->fetch(PDO::FETCH_OBJ)) {
            if ($Site->site == $this->site) {
                $resp->mensagem = "O portal $this->site já foi cadastrado!!";
                $resp->status = false;
                return $resp;
            }
        }
        $sql = $db->query("insert into portal(id_portal,nm_portal,email,site) values( $id_portal->max,'$this->nm_portal','$this->email','$this->site')");
        $sql->fetch();
        $resp->mensagem = "O portal $this->site foi cadastrado com sucesso!";
        $resp->status = true;
        return $resp;
    }
    
    function getPortal(){
        require '../../_config/conexao.inc.php';
        $query = "select * from portal";
        $portais = $this->sql($db, $query);
        return $portais;
    }
    
    function getPortalById($id){
        require '../../_config/conexao.inc.php';
        require_once 'Resposta.inc.php';
        $resp = new Resposta();
        $sql = $db->query("select * from noticia where id_portal = $id");
        $array = [];
        while ($noticia = $sql->fetch(PDO::FETCH_OBJ)){
            $array[] = $noticia;
        }
        if(!$noticia){
            $resp->status = false;
            $resp->mensagem = "Nenhum registro encontrado";
        }else{
            $resp->status = true;
            $resp->valorRetorno = $array;
        }
        return $resp;
    }
    
    function sql($db,$query){
        $sql = $db->query("$query");
        $array = [];
        while ($result = $sql->fetch(PDO::FETCH_OBJ)){
            $array[] = $result;
        }        
        return $array;
    }
    
    
    

}
?>

<a href="Resposta.class.php"></a>