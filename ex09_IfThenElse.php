<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<?php
    $nome = "zé";
    if ($nome == "João") {
        echo "<h1>O nome é $nome</h1>";
    } elseif ($nome == "Maria") {
        echo "<h1>O nome não é joão, é $nome</h1>";
    } elseif ($nome == "Joana") {
        echo "<h1>O nome é $nome</h1>";
    } else {
        echo "<h1>O nome não é nenhum desses, é $nome</h1>";
    }
?>
<br>
</body>
</html>
