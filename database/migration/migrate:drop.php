<?php require '../classes/Migrate.class.php';
$migrate = new Migrate();
$migrate->down();
header('Location:../../index.php');