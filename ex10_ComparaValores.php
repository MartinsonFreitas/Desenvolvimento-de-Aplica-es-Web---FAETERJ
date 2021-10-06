<!DOCTYPE html>
<html>
<head>
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
<h1>3DAW</h1>
<h3>Completar exercicio ex10, que está no Drive da turma, <br>
    comparando os valores vindos do formulário e enviar resposta.<br>
    Verificar se os valores são iguais, identicos, diferentes, <br>
    qual deles é o maior e verificar se são maior ou igual a 5 e menor ou igual a 6.</h3>

<?php
$x = $_GET["var1"];
$y = $_GET["var2"];

if ( $x == $y) {
    echo "<p>x é igual a y, x = $x</p>";
} else {
    echo "<p>x não é igual a y, x = $x e y = $y</p>";
}

if ( $x === $y) {
    echo "<p>x é identico a y, x = $x</p>";
} else {
    echo "<p>x não é identico a y, x = $x e y = $y</p>";
}

if ( $x != $y) {  // != é semelhante a <>
    echo "<p>x não é identico a y, x = $x</p>";
} else {
    echo "<p>x é identico a y, x = $x e y = $y</p>";
}

if ( $x !== $y) {
    echo "<p>x não é identico a y, x = $x</p>";
} else {
    echo "<p>x é identico a y, x = $x e y = $y</p>";
}

if ( $x > $y ) {
    echo "<p>x é maior que y, x = $x e y = $y</p>";
} elseif ( $x < $y ) {
    echo "<p>x é menor que y, x = $x e y = $y</p>";
} else {
    echo "<p>x é igual a y, x = $x e y = $y</p>";
}

if ( ($x + $y) >= 5 ) {
    echo "<p>x + y é maior ou igual a 5, x = $x e y = $y</p>";
} else {
    echo "<p>x + y é menor que 5, x = $x e y = $y</p>";
}

if ( ($x + $y) <= 6 ) {
    echo "<p>x + y é menor ou igual a 6, x = $x e y = $y</p>";
} else {
    echo "<p>x + y é maior que 6, x = $x e y = $y</p>";
}


?>
<br>
<form action="ex10_ComparaValores.php" method=GET>
    <h3>Valores</h3>
    <input type=number name="var1"> +
    <input type=number name="var2"> =
    <br><br>
    <input type="submit" value="Comparar">
</form>
<br>
</body>
</html>
