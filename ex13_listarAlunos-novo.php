<?php

//  Vou escrever os dados do formulário em um arquivo de dados
    $linhas = array();
    $colunas = array();
    $arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
    $x = 0;
    $cabecalho =  fgets($arquivoAluno);
    $colunas = explode(";", $cabecalho);
//    echo $colunas[0] . ";" . $colunas[1] . ";" . $colunas[2] . ";" . $colunas[3];
//    echo "<br>imprimi parte do cabecalho<br>";
    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
//        echo $linhas[$x] . "<br>";
//        $x++;
    }
    fclose($arquivoAluno);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Aluno</h1>
<br>
<a href="ex13_inserirAluno.php">Inserir Aluno</a><br>
<a href="ex13_alterarAluno.php">Alterar Aluno</a><br>
<a href="ex13_listarAlunos.php">Listar Alunos</a><br>
<a href="ex13_excluirAluno.php">Excluir Aluno</a><br>
<a href="ex13_detalheAluno.php">Detalhe de Aluno</a><br>
<br><br>
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
        foreach ($linhas as $linha) {
            echo "<tr>";
            $colunas1 = array();
            $colunas1 = explode(";", $linha);
//            echo $linha . "<br>";
            foreach ($colunas1 as $coluna){
                echo "<td>$coluna</td>";
            }
            echo "</tr>";
        }
        ?>
</table>

</body>
</html>
