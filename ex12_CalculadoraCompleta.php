<?php

echo (sqrt(4));
echo "<br>";
echo 4**2;
echo "<br>";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 }

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<br>
<form action="ex12_Calculadora.php" method=POST>
    <h3>Calculadora</h3>
    a: <input type=text name="var1"> +
    b: <input type=text name="var2"> =
<?php echo "" ?>
    <br><br>
    <input type="submit" value="Somar">
</form>
<br>
</body>
</html>
