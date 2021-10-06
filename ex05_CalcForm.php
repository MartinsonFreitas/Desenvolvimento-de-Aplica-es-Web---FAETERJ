<?php
	$var1 = $_GET["var1"];
	$var2 = $_GET["var2"];
	
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<form action="ex05_CalcForm.php" method=GET>
<h3>Soma</h3>
<input type=number name="var1" value=<?php echo $var1 ?>> + 
<input type=number name="var2" value=<?php echo $var2 ?>> =
<input type=number name="resultado" value=<?php echo $var1+$var2 ?>>
<br><br>
<input type="submit" value="Calcular">
</form>
<br>

</body>
</html>