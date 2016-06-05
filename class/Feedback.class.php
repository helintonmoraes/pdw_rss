<?php

class Feedback {

    function getFeedback($feed) {
        require_once 'Resposta.class.php';
        $resp = new Resposta();
        $resp = unserialize($feed);
        if($resp->status){
            echo '<div class="alert alert-success" role="alert">'.$resp->mensagem.'</div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">'.$resp->mensagem.'</div>';
        }
    }

}
