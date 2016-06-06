<?php

class Comentarios{
    public $comentario;
    public $id_noticia;
    public $email;
    
    function getConexao(){
        require_once '_config/conexao.inc.php'; 
        return $db;
    }
    function insert(){
        require_once 'Resposta.class.php';
        require_once 'Validator.class.php';
        $resp = new Resposta();
        $db = $this->getConexao();
        
        $sql = $db->query("select max(id_comentario) as id_max from comentarios");
        $id_max = $sql->fetch(PDO::FETCH_OBJ);
        $id_comentario = $id_max->id_max;
        $id_comentario++;
        $id_noticia = (int)  $this->id_noticia;
        //Inserindo a classe de validações
        $validator = new Validator();
        //Passando o método e-mail
        if(!$validator->email($this->email)){
            $resp->status = false;
            $resp->mensagem = "Informe um e-mail válido!";
            return $resp;
        }
        foreach ($this as $input){
            if($input == ""){
                $resp->status = false;
                $resp->mensagem = "Existem campos em branco, corrija-os antes de postar!";
                return $resp;
            }
        }
        $sql = $db->query("insert into comentarios (id_comentario,comentario, email, id_noticia)
            values ($id_comentario,'$this->comentario','$this->email',$id_noticia);");
        // arrumar acima
        $sql->fetch();
        $resp->status = true;
        $resp->mensagem = "Comentário adicionado com sucesso!";
        return $resp;
    }
    
    
    
}