 <?php
 
 //------------------------------Entre aqui com seus dados de banco-------------
 
 $nomeDoBanco = "pdw_rss";
 $nomeDoUsuarioDoPostgres = "helinton";
 $password = "uniao";
 
 //-----------------------------------------------------------------------------
 
 try {
    $db = new PDO("pgsql:host=localhost dbname=$nomeDoBanco user=$nomeDoUsuarioDoPostgres password=$password");
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
 