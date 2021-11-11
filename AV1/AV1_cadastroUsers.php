<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$matricula = $_POST["matricula"];
    $nome = $_POST["nome"];    
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
	    	
	//  Vou escrever os dados do formulário no banco de dados
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
		// }

	// Fazer validação para ver se o usuário existe ou não no banco de dados
	$sql = "select count(*) as total from usuarios where matricula = '$matricula'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		$mensagem = "Matrícula já cadastrada! <br>";
		
		} else {
		//echo "Matrícula não encontrada... Preparando para cadastrar!<br>";
		//}
		// Fim da Validação

		// Faz a inserção na tabela usuario passando os campos que o usuário digitar
		$insert = "INSERT INTO usuarios (nome, matricula, email, cpf) VALUES ('$nome','$matricula','$email','$cpf')";

		//	echo "$nome - $matricula - $email - $cpf <br>";
		//	echo "$insert <br>";
		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Usuário cadastrado com sucesso!";
		
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
	Cadastramento de usuários no projeto.
	</p>
	
	<form action="AV1_cadastroUsers.php" method=POST>
		<p>Matricula: <input type=text name="matricula"></p>
		<p>Nome: <input type=text name="nome"> </p>
		<p>E-mail: <input type=text name="email"> </p>
		<p>C.P.F.: <input type=text name="cpf"> </p>
		
		<br><br>
		<input type="submit" value=" Cadastrar...">
	</form>
</section>

	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>

<section id="list">
	<table style="width: 100%;">
		<th colspan="5">Lista de alunos cadastrados</th>
		<tr >
			<td style='border: 1px solid #ccc; width: 25%;'>Matrícula</td>
			<td style='border: 1px solid #ccc; width: 25%;'>Nome</td>
			<td colspan="3" style='border: 1px solid #ccc; width: 50%;'>Ação</td>
		</tr>
<?php
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
    }

    // Tudo ok? passa adiante...
    // Comando SQL
    //echo "Conexão ok";
    $comandoSQL = "SELECT * FROM usuarios ";

    // obtem o resultado da consulta
    $result = $conn->query($comandoSQL);
    // pega a linha da tabela e associa a um array
    // $linha = $result->fetch_assoc(); //


    // efetuando o laço //
    while($linha = $result->fetch_assoc()) {
        $nome = $linha["nome"];
        $matricula = $linha["matricula"];
        $cpf = $linha["cpf"];
        $email = $linha["email"];

        echo "
        <tr>
            <td style='border: 1px solid #ccc; width: 25%;'>$matricula</td>
            <td style='border: 1px solid #ccc; width: 25;'>$nome</td>
			
			<td style='border: 1px solid #ccc; width: 17%;'>
				<a href='AV1_alterarUser.php?matricula=$matricula'>
					Alterar
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 17%;'>
				<a href='AV1_excluirUser.php?matricula=$matricula'>
					Excluir
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 16%;'>
				<a href='AV1_detalheUser.php?matricula=$matricula'>
					Detalhes
				</a>
			</td>
        </tr>
            ";
}
?>
</table>

<br><br><br><br>

</section>

</body>
</html>

