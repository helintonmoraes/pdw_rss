<?php

class Request {

    function getAtt($classe, $post) {
        require_once "$classe.class.php";
        $obj = new $classe();
        $api = new ReflectionClass($classe);

        $arrayAtt = [];
        $i = 0;
        foreach ($api->getProperties() as $prop) {
            $att = (string) $prop->getName();
            $arrayAtt[$i] = $att;
            $i++;
        }
        foreach ($arrayAtt as $atrib){
            $obj->$atrib = $post["$atrib"];
        }
        
        return $obj;
    }

}
