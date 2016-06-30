
<html>
    <head>
        <title>Inserindo dados com PHP, Ajax e DOM</title>
        <style type="text/css">
            body{
                background:#f7f7ff;
            }

            #geral{
                font:bold 12px trebuchet MS:
                    color:blue;
                position:absolute;
                top:155px;
                left:220px;
            }

            p{
                text-align:center;
                font:bold 15px verdana,arial;
                color:red;
                position:absolute;
                top:200px;
                left:200px;
            }

            legend{
                font:bold 12px trebuchet MS;
                color:#193935;
                text-transform:uppercase;
            }

        </style>
    </head>
    <body>
        <div id="geral">

            <fieldset style="width:300px">
                <legend> Cadastro com ajax, php e DOM </legend>

                <form id="frm">
                    <center>

                        Apelido: <input type="text" name="nome" id="nome"><br>
                        Senha:    <input type="text" name="senha" id="senha"><br>
                        <input type="button" value="cadastrar" onclick="cadastra();">

                    </center>
                </form>

            </fieldset>

        </div>

        <script type="text/javascript">

            var request = getXmlHttp();

            function cadastra() {
                var nm = document.getElementById("nome").value;
                var se = document.getElementById("senha").value;
                var url = "cadastra.php?nome=" + nm + "&senha=" + se;
                request.open("GET", url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.onreadystatechange = confirma;
                request.send(null);
            }

            function confirma() {

                if (request.readyState == 4) {
                    var response = request.responseText;
                    var divmain = document.getElementById("geral");
                    var formid = document.getElementById("frm");
                    var pelement = document.createElement("p");
                    var text = document.createTextNode("Parabéns " + response + ", Cadastro Concluido!");
                    pelement.appendChild(text);
                    divmain.replaceNode(pelement, frm);

                    var ael = document.createElement("a");
                    var pula = document.createElement("<br>");
                    var textlink = document.createTextNode("voltar");

                    ael.appendChild(textlink);
                    ael.setAttribute("href", "Cadastro.html");
                    pelement.appendChild(pula);
                    pelement.appendChild(ael);
                }
            }
        </script>

    </body>
</html>