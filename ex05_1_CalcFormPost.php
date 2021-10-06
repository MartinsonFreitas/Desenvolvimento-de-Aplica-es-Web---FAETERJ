<?php
	$isPost = 0;
	$var1 = 0;
	$var2 = 0;
	$resultado = 0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$var1 = $_POST["var1"];
		$var2 = $_POS["var2"];
		$resultado = $var1 + $var2;
		$isPost = 1;
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<form action="ex05_CalcForm.php" method=POST>
<h3>Soma</h3>
<?php
if (isPost == 1) {
	echo "<input type=number name='var1' value=$var1 > + "; 
	echo "<input type=number name='var2' value= $var2 > = ";
	echo "<input type=number name='resultado' value=$resultado> ";
} else {
	echo "<input type=number name='var1'  > + "; 
	echo "<input type=number name='var2' > = ";
	echo "<input type=number name='resultado' > ";
}
?>
<br><br>
<input type="submit" value="Calcular">
</form>
<br>
</body>
</html>