
<?php require_once '../cabecalho.php'; ?>
<html>


    <head>
        <script>
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", "ajax1.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>

        <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <div class="container">

            <p class="h1"><b>Comece informando um nome no input abaixo:</b></p>
            <form>
                Primeiro nome:
                <input class="form-control"type="text" onkeyup="showHint(this.value)">
            </form>
            <p class="btn btn-default">Sugestoes:</p> <br/>
            
                    <span id="txtHint"></span>
                
                
        </div>
    </body>

</html>
