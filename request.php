<?php
require_once 'class/Request.class.php';
$classe = $_POST['class'];
$request = new Request();
$obj = $request->getAtt($classe,$_POST);
$resp = $obj->insert();
$resp = serialize($resp);
var_dump($resp);
$form = strtolower($classe);

header("Location:database/crud/create-edit-$form.php?r=$resp");

