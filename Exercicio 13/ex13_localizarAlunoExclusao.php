<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricula = $_POST["searchMat"];
//  $x = $_POST["x"];
//  echo $matricula . "<br>";
}
// Declarando os array
$linhas = array();
$colunas = array();

// abrindo o arquivo
$arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");

// declarando a variável para a leitura da linha
$x = 0;

//pegando o cabeçalho das colunas
$cabecalho = fgets($arquivoAluno);

//separando as colunas
$colunas = explode(";", $cabecalho);

while (!feof($arquivoAluno)) {
    $linhas[] = fgets($arquivoAluno);
}

fclose($arquivoAluno);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Dados do Aluno</h1>

<?php

foreach ($linhas as $linha) {

    $colunas1 = array();
    $colunas1 = explode(";", $linha);

    foreach ($colunas1 as $coluna){

        if ($coluna == $matricula ){

            $nome       = $colunas1[0];
            $matricula  = $colunas1[1];
            $dtNasc     = $colunas1[2];
            $email      = $colunas1[3];
            $cpf        = $colunas1[4];
            $telefone   = $colunas1[5];
            $endereco   = $colunas1[6];
            $cidade     = $colunas1[7];
            $estado     = $colunas1[8];
            $cep        = $colunas1[9];

        }
    }
}
?>

<form action="ex13_salvar_exclusao.php" method=POST>
    <!-- form action="alterar_string.php" method=POST -->

    Matricula: <input type=text name="matricula" value="<?php echo $matricula ?>"> <br><br>
    nome: <input type=text name="nome" value="<?php echo $nome ?>"> <br><br>
    email: <input type=text name="email" value="<?php echo $email ?>"> <br><br>
    data nascimento: <input type=text name="dtNasc" value="<?php echo $dtNasc ?>"> <br><br>
    cpf: <input type=text name="cpf" value="<?php echo $cpf ?>"> <br><br>
    telefone:<input type=text name="telefone" value="<?php echo $telefone ?>"> <br><br>
    endereço: <input type=text name="endereco" value="<?php echo $endereco ?>"> <br><br>
    cidade: <input type=text name="cidade" value="<?php echo $cidade ?>"> <br><br>
    estado: <input type=text name="estado" value="<?php echo $estado ?>"> <br><br>
    cep: <input type=text name="cep" value="<?php echo $cep ?>"> <br><br>
    <?php
    $linha_old = $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $telefone;
    $linha_old = $linha_old . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep ;
    ?>
    Linha a ser alterada: <input type='text' value="<?php echo $linha_old ?>" name="linha_old"><br><br>

    <input type="submit" value=" Excluir Aluno ">
</form>

<br><br>
<section style="text-align: center;">
    <a href="ex13_inserirAlunoArquivoAppend.php">Inserir Aluno</a> |
    <a href="ex13_alterarAluno.php">Alterar Aluno</a> |
    <a href="ex13_listarAlunos.php">Listar Alunos</a> |
    <a href="ex13_excluirAluno.php">Excluir Aluno</a> |
    <a href="ex13_detalheAluno.php">Detalhe de Aluno</a>
</section>
<br><br>

</body>
</html>


