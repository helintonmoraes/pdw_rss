
<a href="../documentos/manual.html"></a>
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
    echo '<h1>Configure usuario e senha do seu banco no arquivo...(pdw_rss/_config/conexao.inc.php)</h1>'
    . '<h3>acesse o link:<a href="documentos/manual.html">Instuções</a> Para instuções:</h3>';
 }
 