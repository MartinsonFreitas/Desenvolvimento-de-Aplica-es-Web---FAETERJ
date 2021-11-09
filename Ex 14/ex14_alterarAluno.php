<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$matricula = $_GET["matricula"];
	
	$mensagem = "";
    	
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$matricula = $_POST["matricula"];
	$nome = $_POST["nome"];    
	$email = $_POST["email"];
    $cpf = $_POST["cpf"];
    	
	//  Vou Re-escrever os dados do formulário no banco de dados
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

	// Comando SQL para atualizar os dados no BD
	$alterar = "UPDATE alunos SET nome = '$nome', email = '$email', cpf = '$cpf' where matricula = '$matricula' " ;
	
	if (@mysqli_query($conn, $alterar)){
		
		$mensagem = "Alteração efetuada com sucesso";
		
		} else {
			
			die (mysqli_error($conn));
			$mensagem = "Erro em efetuar as alterações";
			
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
	 <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
	<section id="menu">
		<h1>3DAW - CRUD COM SGBD MySql - UPDATE</h1>
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
				<input type="submit" value=" Procurar... ">
			</p>
		</form>    
	</article>
	
	
	
	<form action="ex14_alterarAluno.php" method=POST>
		<p>Matricula: <input type=text name="matricula" value="<?php echo $matricula ?>"></p>
		<p>Nome: <input type=text name="nome" value="<?php echo $nome ?>"> </p>
		<p>E-mail: <input type=text name="email" value="<?php echo $email ?>"> </p>
		<p>C.P.F.: <input type=text name="cpf" value="<?php echo $cpf ?>"> </p>
		
		<br>
		<input type="submit" value=" Alterar... ">
	</form>

</section>

	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
</body>
</html>

