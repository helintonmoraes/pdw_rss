<?php

require_once '../seeder/ImagensSeeder.class.php';
$imagens = new ImagensSeeder();
$imagens->seed();

header('Location:../../index.php');



