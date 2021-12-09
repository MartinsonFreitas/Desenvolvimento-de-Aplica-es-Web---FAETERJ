<?php
	
	$mensagem = "";
	
    $pergunta = $_GET["pergunta"];
	$resposta = $_GET["resposta"];
    $pontos = $_GET["pontos"];
    $grau = $_GET["grau"];

//	echo "Pergunta: " . $pergunta . "<br>";
//	echo "Respota: " . $resposta . "<br>";
//	echo "pontos: " . $pontos . "<br>";
//	echo "grau: " . $grau . "<br>";
	
//  JSON: {"pergunta":"quem descobriu o Brasil?","pontos":"2","grau":"facil"}
//  $resposta = "{\"pergunta\":\"$pergunta\",\"pontos\":\"$pontos\",\"grau\":\"$grau\"}";
//  $resposta2 = "{\"pergunta\":\"" . $pergunta . "\",\"pontos\":\"" . $pontos . "\",\"grau\":\"" . $grau . "\"}";
    	
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
		
		$mensagem = "Pergunta já cadastrada!";
		
		} else {
		
		// Fim da Validação

		// Faz a inserção na tabela perguntas passando os campos que o usuário digitar
		$insert = "INSERT INTO perguntas ( pergunta, resposta, pontuacao, dificuldade) VALUES ( '$pergunta','$resposta','$pontos','$grau')";

		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Pergunta cadastrada com sucesso!";
		
		}
		//Fechando a conexão com o banco de dados
		mysqli_close($conn);
		
		// Finaliza a operação
    }
	
	echo "$mensagem";
?>