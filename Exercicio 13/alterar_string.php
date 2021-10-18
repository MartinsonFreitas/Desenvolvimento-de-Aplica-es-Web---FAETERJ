<?php

//  Recebendo os dados do form pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $dtNasc = $_POST["dtNasc"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $fone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    $linha_old = $_POST["linha_old"];

}

//  Organizando a nova linha para ser alterada no arquivo .txt
    $linha_nova = $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $fone;
    $linha_nova = $linha_nova . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep;

// linha nova a ser incluida no array
    echo "Trocar: $linha_old <br>";
    echo "Por: $linha_nova <br><br><br>";

// Declarando os array
    $linhas = array();
    $colunas = array();



/* alterando */
//Ler o arquivo
//    $linhas = explode("\n", file_get_contents("./alunoNovo.txt"));

// abre o arquivo colocando o ponteiro de escrita no final
    $arquivo = fopen('alunoNovo.txt','r+');
    if ($arquivo) {
        $string = "";

        while(true) {
            $linha = fgets($arquivo);
           // echo "$linha <br>";

            // busca na linha atual o conteudo que vai ser alterado
            if(preg_match("/$matricula/", $linha)) {
                $string .= str_replace($linha_old, $linha_nova, $linha);
                //$atualizando = str_replace($linha_old, $linha_nova, $linhas);

            } else {
                // vai criar uma nova string
                $string .= $linha;

            }
          //  echo $string;
            if ($linha==null) break;

        }

        // move o ponteiro para o inicio do arquivo
        rewind($arquivo);

        // Apaga o conteudo
        ftruncate($arquivo, 0);

        // reescreve o conteudo dentro do arquivo
        if (!fwrite($arquivo, $string)) die('Não foi possível atualizar o arquivo.');
        echo "<h1>Alterações Salvas com sucesso</h1>";
        fclose($arquivo);
    }

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

// abrindo o arquivo
$arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");

// declarando a variável para enumerar as linhas
$x = 0;

//pegando o cabeçalho das colunas
$cabecalho = fgets($arquivoAluno);
//    echo "$cabecalho <br>";

//separando as colunas
$colunas = explode(";", $cabecalho);

while (!feof($arquivoAluno)) {
    $linhas[] = fgets($arquivoAluno);

//    echo "$x - ";
//    echo "$linhas[$x]. <br>";
//    $x++;
}

?>

<!-- Exibindo os dados numa tabela -->
<table>
    <tr>
        <th><?php echo $colunas[0] ?></th>
        <th><?php echo $colunas[1] ?></th>
        <th><?php echo $colunas[2] ?></th>
        <th><?php echo $colunas[3] ?></th>
        <th><?php echo $colunas[4] ?></th>
        <th><?php echo $colunas[5] ?></th>
        <th><?php echo $colunas[6] ?></th>
        <th><?php echo $colunas[7] ?></th>
        <th><?php echo $colunas[8] ?></th>
        <th><?php echo $colunas[9] ?></th>
    </tr>

    <?php
    // Exibindo dados do .txt na tabela
    // linhas
    foreach ($linhas as $linha) {
        echo "<tr>";

        // colunas
        $colunas1 = array();
        $colunas1 = explode(";", $linha);

        foreach ($colunas1 as $coluna){
            echo "<td>$coluna</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<!-- Menu Horizontal -->
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
