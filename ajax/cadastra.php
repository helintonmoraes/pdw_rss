<?php

include "conexao.inc.php";

$nm = addslashes(trim($_GET["nome"]));
$se = addslashes(trim($_GET["senha"]));
$sql = "INSERT INTO clientes(nome_cliente, senha) VALUES('$nm','$se')";
$insert = $db->query($sql);
$rs = $insert->fetch();
if (!$rs)
    echo "Não foi possivel realizar seu cadastro!";
else
    echo $nm;


?>