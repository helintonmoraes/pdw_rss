<?php

require_once '../seeder/ComentariosSeeder.class.php';

$comentarios = new ComentariosSeeder();
$comentarios->seed();
header('Location:../../index.php');



