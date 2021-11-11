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
	$select = "SELECT * from alunos where matricula = '$matricula'";
	// executa o comando sql
	$result = $conn->query($select);
	// retorna o resulta da consulta
	$row = mysqli_fetch_assoc($result);
	
	// Se não encontra... Mostra a mensagem!
	if($row == 0) {
		$mensagem = "Matrícula não encontrada! <br>";
		// Caso o contrário retorna os valores da BD
		} else {

		$mensagem = "Detalhes do aluno! <br>";
		
			$nome = $row["nome"];
			$matricula = $row["matricula"];
			$cpf = $row["cpf"];
			$email = $row["email"];
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
	Vamos aproveitar o formulário já utilizado no incluir aluno para facilitar, modificando os comando do SQL e inserindo um campo para procurar o aluno a ser alterado...
	</p>
	
	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
	<form>
		<p>Matricula: <input disabled type=text name="matricula" value="<?php echo $matricula ?>"></p>
		<p>Nome: <input disabled type=text name="nome" value="<?php echo $nome ?>"> </p>
		<p>E-mail: <input disabled type=text name="email" value="<?php echo $email ?>"> </p>
		<p>C.P.F.: <input disabled type=text name="cpf" value="<?php echo $cpf ?>"> </p>
	</form>
			

</section>
<br>
<br>

</body>
</html>

