<?php

require_once 'class/Request.class.php';
$classe = $_POST['class'];
$request = new Request();
$obj = $request->getAtt($classe,$_POST);
$obj->insert();

