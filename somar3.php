<?php
function somar($x, $y)
    {
        return $x + $y;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["var1"];
    $y = $_POST["var2"];

    if (is_numeric($x) and is_numeric($y)) {
        $somar = somar($x, $y);
    } else {
        $somar = "Os valores devem ser números";
    }
}
?>
<!doctype html>
<html>
<head></head>
<body>
<h1>3DAW</h1>
<br>
<form action="somar3.php" method="post">
    <h3>Somar dois numeros</h3>
    a: <input type="text" name="var1"> +
    b: <input type="text" name="var2"> =
    <?php if (!empty($somar)) {
        echo "$somar";
    } ?>
    <br><br>
    <input type="submit" value="Somar">
</form>
<br>
</body>
</html>
