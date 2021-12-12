<?php
	$search = $_GET["search"];
	
  /*  $pergunta = $_GET["sPergunta"];
	$resposta = $_GET["sResposta"];
    $pontos = $_GET["sPontos"];
    $grau = $_GET["sGrau"];*/

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawmanha2";
	
    $conn = new mysqli($servidor,$username,$senha, $database);
    if ($conn->connect_error) {
        die("Conexao Falhou, avise o administrador do sistema");
    }
	
	// Fazer validação para ver se a pergunta já existe ou não no banco de dados
	$sql = "select count(*) as total from perguntas where pergunta = '$search'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		
		/*$comandoSQL = "UPDATE INTO perguntas (pergunta, pontos, grauDificuldade) VALUES ('$pergunta',$pontos,'$grau') pergunta = '$pergunta'";
		$result = $conn->query($comandoSQL);
		
		$mensagem = "Pergunta encontrada!";*/

		$jPergunta = json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);

	//    echo "Pergunta: " . $pergunta . "<br>";
	//    echo "pontos: " . $pontos . "<br>";
	//    echo "grau: " . $grau . "<br>";

		$resposta = "{\"pergunta\":\"$pergunta\",\"pontos\":\"$pontos\",\"grau\":\"$grau\"}";
		$resposta2 = "{\"pergunta\":\"" . $pergunta . "\",\"pontos\":\"" . $pontos . "\",\"grau\":\"" . $grau . "\"}";

		echo $jPergunta;
		
	} else {
		
	$mensagem = "Pergunta não encontrada!";
		
	}	
	
    
?>