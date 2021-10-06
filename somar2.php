<?php
    $soma =0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $x = $_POST["var1"];
    $y = $_POST["var2"];

    $soma = $x + $y;

}

?>

<!DOCTYPE html>

<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<br>
<form action="somar2.php" method=POST>
    <h3>Somar dois Números</h3>
    a: <input type=text name="var1"> +
    b: <input type=text name="var2"> =
    <?php echo "$soma" ?>
    <br><br>
    <input type="submit" value="Somar">
</form>
<br>
</body>
</html>