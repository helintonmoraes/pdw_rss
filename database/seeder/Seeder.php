<?php

class Seeder {

    function getNoticiasSeeder() {
        require_once 'NoticiasSeeder.class.php';
        $noticias = new NoticiasSeeder();
        return $noticias;
    }
    function getComentariosSeeder(){
        require_once 'ComentariosSeeder.class.php';
        $coments = new ComentariosSeeder();
        return $coments;
    }
    
    
    
    
    function seed(){
        $this->getNoticiasSeeder()->seed();
        //$this->getComentariosSeeder()->seed();
    }

}
