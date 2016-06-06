<?php
libxml_use_internal_errors(true);

$objDom = new DomDocument();

$objDom->load("portalNoticias.xml");

if (!$objDom->schemaValidate("portalNoticias.xsd")) {
        $arrayAllErrors = libxml_get_errors();
            print_r($arrayAllErrors);

}else {
    
            echo "XML obedece às regras definidas no arquivo XSD!";

}