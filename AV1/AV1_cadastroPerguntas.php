<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//$id = $_POST["id"];
    $pergunta = $_POST["pergunta"];    
    $resposta = $_POST["resposta"];
    $pontuacao = $_POST["pontuacao"];
	$dificuldade = $_POST["dificuldade"];
	    	
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

	// Fazer validação para ver se a pergunta já existe ou não no banco de dados
	$sql = "select count(*) as total from perguntas where pergunta = '$pergunta'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		$mensagem = "Pergunta já cadastrada! <br>";
		
		} else {
		
		// Fim da Validação

		// Faz a inserção na tabela perguntas passando os campos que o usuário digitar
		$insert = "INSERT INTO perguntas ( pergunta, resposta, pontuacao, dificuldade) VALUES ( '$pergunta','$resposta','$pontuacao','$dificuldade')";

		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Pergunta cadastrada com sucesso!";
		
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
	Vamos cadastrar as perguntas a serem usadas no projeto, lembrado que:
	<ul>
		<li>A Pergunta terá Texto máximo de 200 caracteres...</li>
		<li>Quantidade de Pontos (1 a 100)</li>
		<li>Grau de dificuldade (fácil, média, difícil e muito difícil).</li>	
	</ul>
	
	</p>
	
	<form action="AV1_cadastroPerguntas.php" method=POST>
		<p>Pergunta: <textarea type=text name="pergunta"></textarea></p>
		<p>Resposta: <textarea type=text name="resposta"></textarea></p>
		<p>Pontuação: <input type=text name="pontuacao"> </p>
		<p>Dificuldade: <br>
			<select name="dificuldade" type="text">
				<option value="Baixa"> Baixa </option>
				<option value="Media"> Média </option>
				<option value="Dificil"> Dificil </option>
				<option value="Muito Dificil"> Muito Dificil </option>				
			</select>		
		</p>
		
		<br><br>
		<input type="submit" value=" Cadastrar Pergunta...">
	</form>


	<section style="width: 100%; text-align= center;">
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
<br>
<br>

</section>

<section id="list">
	<table style="width: 100%;">
		<th colspan="5">Lista de perguntas cadastradas</th>
		<tr >
			<td style='border: 1px solid #ccc; width: 5%;'>Id</td>
			<td style='border: 1px solid #ccc; width: 50%;'>Pergunta</td>
			<td colspan="3" style='border: 1px solid #ccc; width: 45%;'>Ação</td>
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
    $comandoSQL = "SELECT * FROM perguntas ";

    // obtem o resultado da consulta
    $result = $conn->query($comandoSQL);
    // pega a linha da tabela e associa a um array
    // $linha = $result->fetch_assoc(); //


    // efetuando o laço //
    while($linha = $result->fetch_assoc()) {
        $id = $linha["id"];
        $pergunta = $linha["pergunta"];
        $resposta = $linha["resposta"];
        $pontuacao = $linha["pontuacao"];
		$dificuldade = $linha["dificuldade"];

        echo "
        <tr>
            <td style='border: 1px solid #ccc; width: 5%;'>$id</td>
            <td style='border: 1px solid #ccc; width: 50;'>$pergunta</td>
			
			<td style='border: 1px solid #ccc; width: 15%;'>
				<a href='AV1_alterarPergunta.php?id=$id'>
					Alterar
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 15%;'>
				<a href='AV1_excluirPergunta.php?id=$id'>
					Excluir
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 15%;'>
				<a href='AV1_detalhePergunta.php?id=$id'>
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

