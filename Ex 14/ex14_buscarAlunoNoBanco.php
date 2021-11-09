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
	 <link rel="stylesheet" href="estilo.css">
</head>
<body>

<section id="menu">
    <h1>3DAW - CRUD COM SGBD MySql</h1>
    <br>
	<a href="ex14_home.php">Início</a> |
	<a href="ex14_listarAlunos.php">Listar Alunos</a> |
    <a href="ex14_inserirAluno.php">Inserir Aluno</a> |
    <a href="ex14_alterarAluno.php">Alterar Aluno</a> |
    <a href="ex14_excluirAluno.php">Excluir Aluno</a> |
    <a href="ex14_detalheAluno.php">Detalhe de Aluno</a>
</section>
<br>
<br>

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
