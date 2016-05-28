
<?php
include '../../cabecalho.php';
?>
<div class="container">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Gestor de Notícias</h1>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form">
                            <div class="form-group">
                                <label>Título</label>
                                <input class="form-control">

                            </div>

                            <div id="sandbox-container" class="form-group">
                                <label>Data</label>
                                <div class="input-group date" id="calender">
                                    <input type="text" id="calender" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Imagem</label>
                                <input type="file">
                            </div>
                            <div class="form-group">
                                <label>Gravata</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Conteúdo</label>
                                <textarea class="form-control" rows="4"></textarea>
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












<?php include_once '../../rodape.php'; ?>
