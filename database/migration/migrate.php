<?php

require_once '../classes/Migrate.class.php';

$migrate = new Migrate();
$migrate->up();
header('Location:../../index.php');
