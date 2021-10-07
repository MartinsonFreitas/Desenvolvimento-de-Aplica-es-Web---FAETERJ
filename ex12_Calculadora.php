<?php
$resultado = "";

function soma(int $a, int $b){
    return $a + $b;
}

function subtracao(int $a, int $b){
    return $a - $b;
}

function multiplicacao(int $a, int $b){
    return $a * $b;
}

function divisao(int $a, int $b){
    return $a / $b;
}

function quadrado(int $a){
    return $a * $a;
}

function raiz(int $a){
    return sqrt($a);
}

function inverso(int $a){
    return 1 / $a;
}

//retorna a b% de a;
function porcentagem(int $a, int $b){
    return ($a * $b)/100;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n1 = $_POST['var1'];
    $n2 = $_POST['var2'];

    if ( $n1 != "" and $n2 != "") {
        $resultado = soma($n1, $n2);
    } else {
        echo "<p>Algum dos campos está vazio!!!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Calculadora</title>
    <meta charset="utf-8">

    <style>
        body {
            background-color: dimgray;
            color: white;
            font-size: 18px;
            text-align: justify;
            margin-top: 50px;
            margin-left: 100px;
        }
    </style>

</head>
<body>

<h1>3DAW - Calculadora</h1>
<br>

<form action="ex12_Calculadora.php" method=POST>
    <h3>Somar Dois Numeros</h3>
    a: <input type=text name="var1"> +
    b: <input type=text name="var2"> =

    <?php echo "$resultado" ?>

    <br><br>
    <input type="submit" value="Somar">
</form>
<br>
</body>
</html>
