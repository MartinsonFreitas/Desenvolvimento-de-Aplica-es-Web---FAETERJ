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

// abrindo o arquivo
    $arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");

// declarando a variável para enumerar as linhas
    $x = 0;

//pegando o cabeçalho das colunas
    $cabecalho = fgets($arquivoAluno);
    echo "$cabecalho <br>";

//separando as colunas
    $colunas = explode(";", $cabecalho);

while (!feof($arquivoAluno)) {
    $linhas[] = fgets($arquivoAluno);

    echo "$x - ";
    echo "$linhas[$x]. <br>";
    $x++;

}

/* alterando */
//Ler o arquivo
    $linhas = explode("\n", file_get_contents("./alunoNovo.txt"));

// abre o arquivo colocando o ponteiro de escrita no final
    $arquivo = fopen('alunoNovo.txt','r+');
    if ($arquivo) {
        while(true) {
            $linha = fgets($arquivo);
           // echo "$linha <br>";
            if ($linha==null) break;

            // busca na linha atual o conteudo que vai ser alterado
            if(preg_match("/$linha/", $linha_old)) {
                $string.= str_replace($linha_old, $linha_nova, $linha);
                //$atualizando = str_replace($linha_old, $linha_nova, $linhas);

            } else {
                // vai criar uma nova string
                $string.= $linha;
                echo $string;
            }
        }

        // move o ponteiro para o inicio do arquivo
        rewind($arquivo);

        // Apaga o conteudo
        ftruncate($arquivo, 0);

        // reescreve o conteudo dentro do arquivo
        if (!fwrite($arquivo, $string)) die('Não foi possível atualizar o arquivo.');
        echo 'Arquivo atualizado com sucesso';
        fclose($arquivo);
    }

?>