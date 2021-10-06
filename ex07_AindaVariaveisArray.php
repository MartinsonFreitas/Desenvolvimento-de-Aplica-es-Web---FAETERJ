<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
texto escrito antes do PHP
<?php
$nome1 = "Adalberto";
$nome2 = "Agda";
$nome3 = "Alexandre";
$nome4 = "Amanda";
$nome5 = "Brenda";
$nomes = array("Adalberto", "Agda", "Alexandre", "Amanda", "Brenda");

$email1 = "Adalberto@faeterj-rio.edu.br";
$email2 = "Agda@faeterj-rio.edu.br";
$email3 = "Alexandre@faeterj-rio.edu.br";
$email4 = "Amanda@faeterj-rio.edu.br";
$email5 = "Brenda@faeterj-rio.edu.br";
$emails = array("Adalberto@faeterj-rio.edu.br", "Agda@faeterj-rio.edu.br",
    "Alexandre@faeterj-rio.edu.br", "Amanda@faeterj-rio.edu.br", "Brenda@faeterj-rio.edu.br");

$idade1 = 21;
$idade2 = 22;
$idade3 = 23;
$idade4 = 24;
$idade5 = 25;
$idades = array(21,22,23,24,25);

$media1 = 7.5;
$media2 = 7.6;
$media3= 7.7;
$media4 = 7.8;
$media5 = 7.9;
$medias = array(7.5,7.5,7.5,7.5,7.5);
?>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Media</th>
    </tr>
    <?php
        for ($x=0; $x <= 4; $x++) {
            echo "<tr>";
            echo "<td>$nomes[$x]</td>";
            echo "<td>$emails[$x]</td>";
            echo "<td>$idades[$x]</td>";
            echo "<td>$medias[$x]</td>";
            echo "</tr>";
    }
        ?>
</table>
<br>
</body>
</html>