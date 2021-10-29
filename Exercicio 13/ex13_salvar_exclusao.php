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

            if(preg_match("/$matricula/", $linha)) {

                $txt = "";

            } else {

                $txt = $linha;
            }

            fwrite($arquivoAlunoOut, $txt);

            if ($linha==null) {
                break;
            }
        }

        fclose($arquivoAlunoOut);

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
    $colunasListar = explode(";", $cabecalho);

    while (!feof($arquivoAluno)) {
        $linhasListar[] = fgets($arquivoAluno);

    //    echo "$x - ";
    //    echo "$linhas[$x]. <br>";
    //    $x++;
    }

?>

<!-- Exibindo os dados numa tabela -->
<table style="border: 1px solid;">
    <tr>
        <th><?php echo $colunasListar[0] ?></th>
        <th><?php echo $colunasListar[1] ?></th>
        <th><?php echo $colunasListar[2] ?></th>
        <th><?php echo $colunasListar[3] ?></th>
        <th><?php echo $colunasListar[4] ?></th>
        <th><?php echo $colunasListar[5] ?></th>
        <th><?php echo $colunasListar[6] ?></th>
        <th><?php echo $colunasListar[7] ?></th>
        <th><?php echo $colunasListar[8] ?></th>
        <th><?php echo $colunasListar[9] ?></th>
    </tr>

<?php
    // Exibindo dados do .txt na tabela
    // linhas
    foreach ($linhasListar as $linhaListar) {

        if ($linhaListar == null) {
            break;
        } else {

            echo "<tr>";
            echo "<td style='border: 1px solid;'> $x </td>";
            $colunas1 = array();
            $colunas1 = explode(";", $linhaListar);

            foreach ($colunas1 as $colunaListar) {
                echo "<td style='border: 1px solid;'>$colunaListar</td>";
            }
            echo "</tr>";

            $x++;

        }

    //    fclose($arquivoAluno);
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

