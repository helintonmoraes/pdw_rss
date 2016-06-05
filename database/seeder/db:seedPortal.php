<?php

require_once '../seeder/PortalSeeder.class.php';

$portal = new PortalSeeder();
$portal->seed();

header('Location:../../index.php');



