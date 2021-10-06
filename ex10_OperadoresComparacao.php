<!DOCTYPE html>
<html>
<head>

</head>
<body>
<h1>3DAW</h1>

<?php
// Operadores Comparação ==, ===, !=, <>, >, <, >=, <=, <=>
$x = 7;
$y = 5;
if ( $x == $y) {
    echo "x é igual a y, x = $x";
} else {
    echo "x não é igual a y, x = $x e y = $y";
}
$y=7;
echo "<br><br>";
if ( $x === $y) {
    echo "x é identico a y, x = $x";
} else {
    echo "x não é identico a y, x = $x e y = $y";
}
$y=7;
echo "<br><br>";
if ( $x != $y) {  // != é semelhante a <>
    echo "x é identico a y, x = $x";
} else {
    echo "x não é identico a y, x = $x e y = $y";
}
echo "<br><br>";
if ( $x !== $y) {
    echo "x é identico a y, x = $x";
} else {
    echo "x não é identico a y, x = $x e y = $y";
}
?>
<br>
</body>
</html>
