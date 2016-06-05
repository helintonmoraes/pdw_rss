<?php

class ImagensSeeder {

    function getConexao() {
        require_once '../../_config/conexao.inc.php';
        return $db;
    }

    //--------------------------------------------------------------------------
    function seed() {
        $db = $this->getConexao();
       

        foreach (range(0, 300) as $id) {
            
            $id_imagem = $id;
            $imagem = rand(0, 20).".jpg";
            $destaque = 0;
            $id_noticia = rand(0, 80);
            
            //-----------------------------------------------------------------------------
            $query = $db->query("insert into imagens(id_imagem,imagem,destaque,id_noticia) "
                    . "values ($id_imagem,'$imagem','$destaque',$id_noticia);");
        }
        
        foreach (range(0, 80) as $i) {
            $id++;
            $id_imagem = $id;
            $imagem = rand(0, 20).".jpg";
            $destaque = 1;
            $id_noticia = $i;
            
            //-----------------------------------------------------------------------------
            $query = $db->query("insert into imagens(id_imagem,imagem,destaque,id_noticia) "
                    . "values ($id_imagem,'$imagem','$destaque',$id_noticia);");
        }
        
        
        
    }

}

//$query=$db->prepare("Select * from ?");
//$query->excute(array($myinsecuredata));