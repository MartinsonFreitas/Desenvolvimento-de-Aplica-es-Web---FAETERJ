<?php
 echo 'Rodando arquivos  .PHP <br>';

 $include="db_stdlibwebseller_saude.php"; //arquivo que deve ser incluido
 
 $arquivos="sau1_sau_prestadores000.php func_consultamedicaprontuarios.php sau1_sau_prestadores002.php edu4_classificacao.RPC.php edu4_classificacao.php"; //arquivos de procura

$linha_n = "db_stdlibwebseller.php";// Procura pela ocorrencia dentro do arquivo

$explode=explode(" ",$arquivos);

foreach ($explode as $key => $value) {
      echo "Arquivo procurado:::".$value."<br>";
 if(file_exists($value)){
          chmod($value, 0777);
     }else{

         echo "<font size='3' color='green'> arquivo não existe::: {$value} </font>";
          continue;
     }

//Ler o arquivo
$linhas = explode("\n", file_get_contents("./{$value}"));

// abre o arquivo colocando o ponteiro de escrita no final
$arquivo = fopen($value,'r+');

if ($arquivo) {

  while(true) {

    $linha = fgets($arquivo);

    if ($linha==null) break;
      
    // busca na linha atual o conteudo que vai ser alterado
    if(preg_match("/$linha_n/", $linha)) {
    
    $string .= str_replace("$linha_n",$include, $linha);
    $mudanca=str_replace("$linha_n",$include, $linha);
                 $countlinha=substr_count($string, "\n");

               echo "<font size='3' color='red'>Padrao encontrado:: {$value}  <br>Linha afetada:::: {$linha} <br> Mudança:: {$mudanca} <br> Linha de ocorrencia ::: {$countlinha} </font>";
                    echo "<br>";

    } else {
    // vai criar uma nova string
    $string.= $linha;
}

}
    // move o ponteiro para o inicio do arquivo
    rewind($arquivo);
    // Apaga o conteudo
    ftruncate($arquivo, 0);

    // reescreve o conteudo dentro do arquivo
    if (!fwrite($arquivo, $string)) die('Não foi possível atualizar o arquivo.');
    fclose($value);
    }
   unset($string);

}

 

 