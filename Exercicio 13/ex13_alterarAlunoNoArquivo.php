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

    $arquivoAlunoIn = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
    $arquivoAlunoOut = fopen("alunosAlterados.txt", "w") or die("Erro na abertura do arquivo");
    $x = 0;
    $linha = "";
    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
        $colunaDados = explode(";", $linhas[$x]);
        if ($colunaDados[1] == $matricula) {
            $txt = "$nome;$matricula;$dtNasc;$email;$cpf;$fone;$endereco;$cidade;$estado;$cep\n";
        } else {
            $txt = $linhas[$x];
        }
        fwrite($arquivoAlunoOut, $txt);
        $x++;
    }
    fclose($arquivoAlunoOut);
    fclose($arquivoAlunoIn);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
<br>
<br>
<form action="ex13_alterarAlunoNoMesmoArquivo.php" method=POST>
    Matricula: <input type=text name="matricula" value='<?php echo "jose da silva"; ?>'> <br>
    nome: <input type=text name="nome" value='<?php echo "jose da silva"; ?>'> <br>
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
