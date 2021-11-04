<?php

//  Vou escrever os dados do formulário em um arquivo de dados
    $linhas = array();
    $colunas = array();
    $arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
    $x = 0;
    $cabecalho =  fgets($arquivoAluno);
    $colunas = explode(";", $cabecalho);
    echo $colunas[0] . ";" . $colunas[1] . ";" . $colunas[2] . ";" . $colunas[3];
    echo "<br>imprimi o cabecalho<br>";
    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
        echo $linhas[$x];
        $x++;
    }
    fclose($arquivoAluno);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Inserir Aluno</h1>
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
    <tr>
        <?php
        foreach ($linhas as $linha) {
            $colunas = explode(";", $linha);
//            echo $linha;
            echo "<td>$colunas[0]</td>";
            echo "<td>$colunas[1]</td>";
            echo "<td>$colunas[2]</td>";
            echo "<td>$colunas[3]</td>";
            echo "<td>$colunas[4]</td>";
            echo "<td>$colunas[5]</td>";
            echo "<td>$colunas[6]</td>";
            echo "<td>$colunas[7]</td>";
            echo "<td>$colunas[8]</td>";
            echo "<td>$colunas[9]</td>";
        }
        ?>
    </tr>
</table>

</body>
</html>
