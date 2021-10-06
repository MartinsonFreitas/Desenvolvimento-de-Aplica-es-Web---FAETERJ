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


$email1 = "Adalberto@faeterj-rio.edu.br";
$email2 = "Agda@faeterj-rio.edu.br";
$email3 = "Alexandre@faeterj-rio.edu.br";
$email4 = "Amanda@faeterj-rio.edu.br";
$email5 = "Brenda@faeterj-rio.edu.br";

$idade1 = 21;
$idade2 = 22;
$idade3 = 23;
$idade4 = 24;
$idade5 = 25;

$media1 = 7.5;
$media2 = 7.6;
$media3= 7.7;
$media4 = 7.8;
$media5 = 7.9;

?>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Media</th>
    </tr>

    <tr>
        <td><?php echo $nome1 ?></td>
        <td><?php echo $email1 ?></td>
        <td><?php echo $idade1 ?></td>
        <td><?php echo $media1 ?></td>
    </tr>
    <tr>
        <td><?php echo $nome2 ?></td>
        <td><?php echo $email2 ?></td>
        <td><?php echo $idade2 ?></td>
        <td><?php echo $media2 ?></td>
    </tr>
    <tr>
        <td><?php echo $nome3 ?></td>
        <td><?php echo $email3 ?></td>
        <td><?php echo $idade3 ?></td>
        <td><?php echo $media3 ?></td>
    </tr>
    <tr>
        <td><?php echo $nome4 ?></td>
        <td><?php echo $email4 ?></td>
        <td><?php echo $idade4 ?></td>
        <td><?php echo $media4 ?></td>
    </tr>
    <tr>
        <td><?php echo $nome5 ?></td>
        <td><?php echo $email5 ?></td>
        <td><?php echo $idade5 ?></td>
        <td><?php echo $media5 ?></td>
    </tr>
</table>
<br>
</body>
</html>