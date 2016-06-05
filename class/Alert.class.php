<?php
class Alert{
    function getConexao() {
        require_once 'conexao.inc.php';
        return $db;
    }
    
    function tab(){
        require_once 'conexao.inc.php';
        $db = $this->getConexao();
        $sql = $db->query("select relname from pg_stat_user_tables order by relname");
        $feed = $sql->fetch();
        return $feed;
    }
}