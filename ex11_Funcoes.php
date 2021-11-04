<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>

<?php
function formataNome($nome, $sobreNome) {
    echo $nome . " " . $sobreNome;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["var1"];
    $y = $_POST["var2"];

    if ( $x != "" and $y != "") {
        formataNome($x, $y);
    } else {
        echo "<p>falta nome ou sobrenome</p>";
    }
}
?>
<br>
<form action="ex11_Funcoes.php" method=POST>
    <h3>Nome do Usuario</h3>
    Nome: <input type=text name="var1"> <br>
    Sobrenome: <input type=text name="var2">
    <br><br>
    <input type="submit" value="Formatar">
</form>
<br>
</body>
</html>
