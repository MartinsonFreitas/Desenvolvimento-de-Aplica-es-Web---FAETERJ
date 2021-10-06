<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>

<?php
$nomes = array("Adalberto", "Agda", "Alexandre", "Amanda", "Brenda");
?>
<table border="1">
    <tr>
        <th>Nome</th>
    </tr>
<?php
    foreach ($nomes as $nome) {
        echo "<tr>";
        echo "<td>$nome</td>";
        echo "</tr>";
    }
?>
</table>
<br>
</body>
</html>
