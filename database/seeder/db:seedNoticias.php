<?php

require_once '../seeder/NoticiasSeeder.class.php';

$noticias = new NoticiasSeeder();
$noticias->seed();

header('Location:../../index.php');



