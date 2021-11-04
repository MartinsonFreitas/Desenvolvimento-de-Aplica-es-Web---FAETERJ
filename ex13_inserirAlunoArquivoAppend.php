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
//  Vou escrever os dados do formulário em um arquivo de dados já existente

        $txt = $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $fone;
        $txt = $txt . ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep . "\n";
        file_put_contents("alunoNovo.txt", $txt, FILE_APPEND);

    }
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
<br>
<form action="ex13_inserirAlunoArquivoAppend.php" method=POST>
    Matricula: <input type=text name="matricula"> <br>
    nome: <input type=text name="nome"> <br>
    email: <input type=text name="email"> <br>
    data nascimento: <input type=text name="dtNasc"> <br>
    cpf: <input type=text name="cpf"> <br>
    telefone:<input type=text name="telefone"> <br>
    endereço: <input type=text name="endereco"> <br>
    cidade: <input type=text name="cidade"> <br>
    estado: <input type=text name="estado"> <br>
    cep: <input type=text name="cep"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>
