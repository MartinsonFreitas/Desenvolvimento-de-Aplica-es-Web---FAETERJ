<?php
    $matricula = "2021212345";
  //  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    //    $matricula = $_GET["matricula"];
 //   }

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
    $comandoSQL = "SELECT * FROM 'alunos' where matricula = '$matricula'";
    // obtem o resultado da consulta
    $result = $conn->query($comandoSQL);
    // pega a linha da tabela e associa a um array
    $linha = $result->fetch_assoc();

    // exibindo o resultado da pesquisa
    $nome = $linha[nome];

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

<Table>
    <tr>
        <td>Matricula</td>
        <td>Nome</td>
        <td>E-mail</td>
        <td>CPF</td>
    </tr>
    <tr>
        <td><?php echo $nome ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
