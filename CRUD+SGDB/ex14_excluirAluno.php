<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$matricula = $_GET["matricula"];
    	
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
	$excluir = "DELETE from alunos where matricula = '$matricula'";
	// executa o comando sql
	$result = $conn->query($excluir);
	// retorna o resulta da consulta
	//$row = mysqli_fetch_assoc($result);
	
	// Se não encontra... Mostra a mensagem!
	if($result != 0){
		$mensagem = "Aluno excluido com sucesso! <br>";
		// Caso o contrário retorna os valores da BD
		} else {		
			echo "Erro em executar a exclusão do aluno de matrícula $matricula! <br>";
		}		
	}
	
	//Fechando a conexão com o banco de dados
	mysqli_close($conn);			
	// Finaliza a operação
	
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
		<h1>3DAW - CRUD COM SGBD MySql - DELETE</h1>
		<br>
		<a href="ex14_home.php">Início</a> |
		<a href="ex14_inserirAluno.php">Inserir Aluno</a> |		
		<a href="ex14_listarAlunos.php">Listar Alunos</a>
	</section>
</header>

<section id="informativo">
	<p>
	Vamos aproveitar o formulário já utilizado no incluir aluno para facilitar, modificando os comando do SQL e inserindo um campo para procurar o aluno a ser alterado...
	</p>
	<article id="pesquisa">
		<form action="ex14_alterarAluno.php" method=GET>
			<p>	Matricula: <input type=text name="matricula">
				<input type="submit" value=" Procurar e excluir... ">
			</p>
		</form>    
	</article>
	<br>
	<br>
	
	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
	
<br>

</section>
<br>
<br>

</body>
</html>

