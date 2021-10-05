<?php 

    $x = "";

    $ids = array( 1, 2, 3);
	$nomes = array( "Agda", "Alexandre", "Alberto");
	$idades = array( 31, 30, 44);
	$emails = array ("agda@gmail.com","alexandre@gmail.com","alberto@gmail.com");
	$medias = array ( 7.5, 5.6, 8.7);

function aluno($id)
{
    echo $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["var1"];
    $id2 = $x -1;

    if ($x != "") {
        aluno($x);
    } else {
        echo "<p>Por favor, escolha um aluno!</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            background-color: dimgray;
            color: white;
            font-size: 18px;
            text-align: justify;
            margin-top: 50px;
            margin-left: 100px;
        }
    </style>
</head>
<body>

<h1>Tabela de Informações do aluno</h1>

<form action="tabela.php" method=POST>
    <h3>Nome do Aluno:</h3>
    <select id="var1" name="var1">
        <?php
        for ($x=0; $x<=2; $x++)
        {
            echo "<option value=\"$ids[$x]\">$nomes[$x]</option>";
        }
        ?>
    </select>
    <input type="submit" value="Procurar">
</form>
<br>

<table border="1" cellspacing="10" cellpadding="10">

	<tr>
		<th>Id</th>
        <th>Nome</th>
		<th>Email</th>
		<th>Idade</th>
		<th>Média</th>
	</tr>
	
	<?php

		if ($y = $id2)
		{
            echo "<td>$ids[$y]</td>";
			echo "<td>$nomes[$y]</td>";
			echo "<td>$emails[$y]</td>";
			echo "<td>$idades[$y]</td>";
			echo "<td>$medias[$y]</td>";
			echo "</tr>";
		}
	?>	
</table>

</body>
</html>
