 <?php
 
 //------------------------------Entre aqui com seus dados de banco-------------
 
 $nomeDoBanco = "pdw_rss";
 $nomeDoUsuarioDoPostgres = "jeferson";
 $password = "270201";
 
 //-----------------------------------------------------------------------------
 
 try {
    $db = new PDO("pgsql:host=localhost dbname=$nomeDoBanco user=$nomeDoUsuarioDoPostgres password=$password");
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
 