<a href="../../destaque.php"></a>
<?php 
session_start();

$destaque = $_SESSION['insert_comment'];
session_destroy();

$r = $_GET['r'];
header("Location: ../../destaque.php?destaque=$destaque&r=$r");
?>