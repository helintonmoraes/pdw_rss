<?php
// Array com os nomes
$a[] = "Jeferson luis silveira - cep: 84<span style='font-size:30px'>046-250</span>";
$a[] = "Jeferson luis da silva - cep: 84<span style='font-size:30px'>046-260</span>";
$a[] = "Jeferson luis oliveira - cep: 84<span style='font-size:30px'>046-270</span>";
$a[] = "Jeferson luis siqueira - cep: 84<span style='font-size:30px'>046-289</span>";
$a[] = "Jeferson luis amoreira - cep: 84<span style='font-size:30px'>046-290</span>";
$a[] = "jana";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// recebendo o parametro da URL
$q = $_REQUEST["q"];

$hint = "";

// procurando todos os itens compativeis do array e diferentes de ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= "<hr/> $name";
            }
        }
    }
}
?>
<table class="table table-hover">
                <tr>

<?php echo $hint === "" ? "sem sugestão" : "<td>" .$hint ."</td>"; ?>

</tr>
</table>
<?php
?>
