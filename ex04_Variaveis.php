<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
texto escrito antes do PHP
<?php
$materia1 = "DAW manha";
$materia2 = "5TAV manha";
$nota1 = 5;
$nota2 = 7;
$media = 6.45;
echo "<br>";
echo "O var_dump retorna o tipo da variavel 'materia1' e seu tamanho: ";
echo "<br>";
var_dump($materia1);
echo "<br>";
var_dump($nota1);
echo "<br>";
var_dump($media);
echo "<br>";
echo $nota1 + $media;
echo "<br>";
echo $materia2 + $media;
echo "<h2>Exercicio 04</h2>";
/*
echo "<table border='1'><tr><td>" . $materia1 . "</td><td>5</td></tr>";
echo "<tr><td>$materia2</td><td>7</td>";
echo "</tr></table>";
echo "<br>";
echo $nota1 + $nota2;
*/
?><br>
<!-- Texto escrito depois do php -->
</body>
</html>