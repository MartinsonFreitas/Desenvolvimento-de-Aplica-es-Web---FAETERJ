<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
texto escrito antes do PHP
<?php
$nomes = array("Adalberto", "Agda", "Alexandre", "Amanda", "Brenda");

$emails = array("Adalberto@faeterj-rio.edu.br", "Agda@faeterj-rio.edu.br",
    "Alexandre@faeterj-rio.edu.br", "Amanda@faeterj-rio.edu.br", "Brenda@faeterj-rio.edu.br");

$idades = array(21,22,23,24,25);

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
//        for ($x=0; $x <= 4; $x++) {
//            echo "<tr>";
//            echo "<td>$nomes[$x]</td>";
//            echo "<td>$emails[$x]</td>";
//            echo "<td>$idades[$x]</td>";
//            echo "<td>$medias[$x]</td>";
//            echo "</tr>";
//    }
        $x=0;
        while ($x <= 4) {
            echo "<tr>";
            echo "<td>$nomes[$x]</td>";
            echo "<td>$emails[$x]</td>";
            echo "<td>$idades[$x]</td>";
            echo "<td>$medias[$x]</td>";
            echo "</tr>";
            $x++;       //$x = $x + 1;
        }
echo "</table>";

        do {
            echo "<span>Testando do while, valor de x: $x</span><br>";
            echo "<span>Testando novamente do while, valor de x: " . $x . "</span>";
            $x++;
        } while ($x < 5)
        ?>

<br>
</body>
</html>