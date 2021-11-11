<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$id = $_GET["id"];
    	
    // Estabelecendo conexão com BD
    // credenciais de acesso
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3dawmanha2";
	
	// executando a conexão
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
	
    // Mensagem de erro se a conexão falhar
    if ($conn->connect_error){
        die("Conexão com erro: " . $conn->connect_error);
    } else {
	// echo "Conexão estabelecida!<br>";

	// Fazer validação para ver se o usuário existe ou não no banco de dados
	$select = "SELECT * from perguntas where id = '$id'";
	// executa o comando sql
	$result = $conn->query($select);
	// retorna o resulta da consulta
	$row = mysqli_fetch_assoc($result);
	
	// Se não encontra... Mostra a mensagem!
	if($row == 0) {
		$mensagem = "Pergunta não encontrada! <br>";
		// Caso o contrário retorna os valores da BD
		} else {

		$mensagem = "Detalhes da Pergunta nº $id! <br>";
		
			$pergunta = $row["pergunta"];
			$resposta = $row["resposta"];
			$pontuacao = $row["pontuacao"];
			$dificuldade = $row["dificuldade"];
		}
		
	//Fechando a conexão com o banco de dados
	mysqli_close($conn);			
	// Finaliza a operação
		
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Exercício 14 - CRUD com SGDB">
	<meta name="keywords" content="HTML, CSS, PHP">
	<meta name="author" content="Martinson Freitas">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>FAETERJ - 3DAW - CRUD + SGDB</title>
	
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
	<section id="menu">
		<h1>Desenvolvimento de Aplicações Web - 3DAW</h1>
		<h2>AV1 3DAW Manhã 2021-2</h2>
		<h3>Aluno: Martinson Lima de Freitas<h3>
		<br>
		<a href="AV1_home.php">Início</a> |
		<a href="AV1_cadastroUsers.php">Cadastro de Usuários</a> |
		<a href="AV1_cadastroPerguntas.php">Cadastro de Perguntas</a>
		
		<br>
	</section>

</header>

<section id="principal">
	<p>
	Vamos aproveitar o formulário já utilizado anteriormente em alterar pergunta...
	</p>
	
	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
	<form>
		<p>Pergunta nº: <input disabled type=text name="id" value="<?php echo $id ?>">
		
		<p>Pergunta: <textarea disabled type=text name="pergunta"><?php echo $pergunta ?></textarea></p>
		<p>Resposta: <textarea disabled type=text name="resposta" ><?php echo $resposta ?></textarea></p>
		<p>Pontuação: <input  disabled type=text name="pontuacao" value="<?php echo $pontuacao ?>"> </p>
		<p>Dificuldade: <input  disabled type=text name="dificuldade" value="<?php echo $dificuldade ?>"></p>		
		<br><br><br>
			

</section>
<br>
<br>

</body>
</html>

