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

//  Escrevendo os dados do formulário em um arquivo de dados já existente
    $txt = $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $fone;
    $txt = $txt . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep;

    //  Mostrando dados cadastrados no .txt //

    //  Criando o array linhas & colunas
    $linhas = array();
    $colunas = array();

    //  Abrindo o arquivo .txt
    $arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");

    $cabecalho =  fgets($arquivoAluno);
    $colunas = explode(";", $cabecalho);

    //  Pegando os dados de cada linha do .txt
    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
        }
    // Para exibir na tabela //

    // Alterando a string //


    //  Fechando o arquivo .txt
    fclose($arquivoAluno);

}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterações Salvas com sucesso</h1>

<br>

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
