<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawgame";
$conn = new mysqli($servidor,$username,$senha, $database);
if ($conn->connect_error) {
    die("Conexao Falhou, avise o administrador do sistema");
}
$comandoSQL = "SELECT * from `perguntas`";
$result = $conn->query($comandoSQL);

$arrPerguntas = array();
$x = 0;
while ($linha = $result->fetch_assoc()) {
    $arrPerguntas[$x] = $linha;
    $x++;
}

$jPergunta = json_encode($arrPerguntas, JSON_UNESCAPED_UNICODE);
echo $jPergunta;