<?php
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

    $arquivoAlunoIn = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
    }
    fclose($arquivoAlunoIn);

    $arquivoAlunoOut = fopen("alunoNovo.txt", "w") or die("Erro na abertura do arquivo");
    $x = 0;
    //$linha = "";
    foreach ($linhas as $linha) {
        $colunaDados = explode(";", $linha);
        if ($colunaDados[1] == $matricula) {
            //$txt = "$nome;$matricula;$dtNasc;$email;$cpf;$fone;$endereco;$cidade;$estado;$cep\n";
        } else {
            $txt = $linha;
        }
        fwrite($arquivoAlunoOut, $txt);
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Alunos Cadastrados</h1>

<br><br>

<table style="border: 1px solid;">
    <tr >
        <th><?php echo "ID" ?></th>
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
    foreach ($linhas as $linha) {

        if ($linha==null) {
            break;
        } else {

            echo "<tr>";
            echo "<td style='border: 1px solid;'> $x </td>";
            $colunas1 = array();
            $colunas1 = explode(";", $linha);

            foreach ($colunas1 as $coluna){
                echo "<td style='border: 1px solid;'>$coluna</td>";
            }
            echo "</tr>";

            $x++;
        }

    }
    ?>
</table>

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
