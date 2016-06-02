<?php
require_once '../../cabecalho.php';
require_once '../../class/Feedback.class.php';
$a = '<div class="alert alert-info" role="alert">Atenção... Todos os campos são obrigatórios (Obs:Nao validado)</div>';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css">
<div class="container">
    <a class="btn btn-danger"href="../../index.php">Home</a>
    <a class="btn btn-warning"href="../../_config/settings.php">Voltar</a>
    <div class="container">    
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Gestor de Notícias</h1>
                </div>
                <?php
                if (isset($_GET['r'])) {
                    $a = new Feedback();
                    $a->getFeedback($_GET['r']);
                } else {
                    echo $a;
                }
                ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form role="form" action="../../request.php" method="post">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control">
                                    <input type="hidden" name="class" value="Noticia" />

                                </div>

                                <div id="sandbox-container" class="form-group">
                                    <label>Data</label>
                                    <div class="input-group date" id="calender">
                                        <input type="text" name="data" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Imagem</label>
                                    <input type="file" name="imagem">
                                </div>
                                <div class="form-group">
                                    <label>Gravata</label>
                                    <textarea name="gravata" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Conteúdo</label>
                                    <textarea name="conteudo" class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Cadastrar</button>
                                <button type="reset" class="btn btn-default">Limpar</button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Referência do arquivo JS do plugin após carregar o jquery -->
<!-- Datepicker -->


<!-- Include all compiled plugins (below), or include individual files as needed -->

<script>
    $(document).ready(function () {
        $('#calender').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"

        });
    });
</script>












