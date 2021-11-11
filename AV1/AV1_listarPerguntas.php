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
				<a href='AV1_alterarAluno.php?matricula=$matricula'>
					Alterar
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 17%;'>
				<a href='AV1_excluirAluno.php?matricula=$matricula'>
					Excluir
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 16%;'>
				<a href='AV1_detalheAluno.php?matricula=$matricula'>
					Detalhes
				</a>
			</td>
        </tr>
            ";
}
?>
</table>

</section>
</body>
</html>
