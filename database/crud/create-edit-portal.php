<?php
require_once '../../cabecalho.php';
require_once '../../class/Feedback.class.php';
$a = '<div class="alert alert-info" role="alert">Atenção... Todos os campos são obrigatórios (Obs:Nao validado)</div>';
?>
<div class="container">
    <a class="btn btn-danger"href="../../index.php">Home</a>
    <a class="btn btn-warning"href="../../_config/settings.php">Voltar</a>
    <div class="panel-heading">
        <h1>Gestor de Portal</h1>
    </div>
    <?php
    if (isset($_GET['r'])) {
        $a = new Feedback();
        $a->getFeedback($_GET['r']);
    } else {
        echo $a;
    }
    ?>
    <form class="container" method="post" action="../../request.php">
        <!-- insiro o nome do portal ------------------------------------->
        <div class="form-group" >
            <label for="exampleInputEmail1">Nome do Portal</label>
            <input type="text" name="nm_portal" class="form-control" name=""placeholder="Nome">
        </div>

        <!-- email-->
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email"name="email" class="form-control" name=""placeholder="Email">
        </div>



        <!-- endereço do portal-->
        <div class="form-group">
            <label for="exampleInputPassword1">URL do portal</label>
            <input type="text" name="site"class="form-control"  placeholder="Endereço">
        </div>
        <input type="hidden" name="class" value="Portal"/>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>