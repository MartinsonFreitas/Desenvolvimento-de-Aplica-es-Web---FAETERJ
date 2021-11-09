<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
	<section id="menu">
		<h1>3DAW - CRUD COM SGBD MySql</h1>
		<br>
		<a href="ex14_home.php">Início</a> |
		<a href="ex14_inserirAluno.php">Inserir Aluno</a> |
		<a href="ex14_alterarAluno.php">Alterar Aluno</a> |
		<a href="ex14_listarAlunos.php">Listar Alunos</a> |
		<a href="ex14_excluirAluno.php">Excluir Aluno</a> |
		<a href="ex14_detalheAluno.php">Detalhe de Aluno</a>
	</section>
</header>

<br>
<br>

<table>
    <th colspan="5">Lista de alunos cadastrados</th>
    <tr >
        <td style='border: 1px solid #ccc; width: 22%;'>Matrícula</td>
        <td style='border: 1px solid #ccc; width: 22%;'>Nome</td>
        <td style='border: 1px solid #ccc; width: 22%;'>CPF</td>
        <td style='border: 1px solid #ccc; width: 22%;'>E-mail</td>
		<td style='border: 1px solid #ccc; width: 12%;'>Ação</td>
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
    $comandoSQL = "SELECT * FROM alunos ";

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
            <td style='border: 1px solid #ccc; width: 22%;'>$matricula</td>
            <td style='border: 1px solid #ccc; width: 22;'>$nome</td>
            <td style='border: 1px solid #ccc; width: 22%;'>$cpf</td>
            <td style='border: 1px solid #ccc; width: 22%;'>$email</td>
			
			<td style='border: 1px solid #ccc; width: 12%;'>
				<a href='ex14_alterarAluno.php?matricula=$matricula'>
					Alterar
				</a>
			</td>
        </tr>
            ";
}
?>
</table>
</body>
</html>
