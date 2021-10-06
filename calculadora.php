<?php

function soma(int $a, int $b){
    return $a + $b;
}

function subtracao(int $a, int $b){
    return $a - $b;
}

function multiplicacao(int $a, int $b){
    return $a * $b;
}

function divisao(int $a, int $b){
    return $a / $b;
}

function quadrado(int $a){
    return $a * $a;
}

function raiz(int $a){
    return sqrt($a);
}

function inverso(int $a){
    return 1 / $a;
}

//retorna a b% de a;
function porcentagem(int $a, int $b){
    return ($a * $b)/100;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];

    $operacao = $_POST['operacao'];

    $v_n1 = 0;
    $v_n2 = 0;

    if ($n1!="" and ctype_digit($n1)) {
        $v_n1 = 1;
    }

    if ($n2!="" and ctype_digit($n2)) {
        $v_n2 = 1;
    }

    if(empty($operacao) || $v_n1 == 0 || $v_n2 == 0){
        echo "Algum dos campos está vazio!!!";
    }
    else{
        switch($operacao)
        {
            case "soma":
                $resultado = soma($n1, $n2);
                break;

            case "subtracao":
                $resultado = subtracao($n1, $n2);
                break;

            case "multiplicacao":
                $resultado = multiplicacao($n1, $n2);
                break;

            case "divisao":
                $resultado = divisao($n1, $n2);
                break;

            case "quadrado":
                $resultado = quadrado($n1);
                break;

            case "raiz":
                $resultado = raiz($n1);
                break;

            case "inverso":
                $resultado = inverso($n1);
                break;

            case "porcentagem":
                $resultado = porcentagem($n1, $n2);
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>

<body>

<h2> Calculadora </h2>
<form action="calculadoraTOTAL.php" method="POST">
    <br>
    Número 1: <input type="text" size="20" name="num1" ><br><br>
    Número 2: <input type="text" size="20" name="num2" > <br><br>
    Operação: <select name="operacao">
        <option value="">Selecione...</option>
        <option value="soma"> Soma </option>
        <option value="subtracao"> Subtração </option>
        <option value="multiplicacao"> Multiplicação </option>
        <option value="divisao"> Divisão </option>
        <option value="quadrado"> x2 </option>
        <option value="raiz"> raiz </option>
        <option value="inverso"> 1/x </option>
        <option value="porcentagem"> % </option>
    </select> <br><br>

    <input value="Calcular" type="submit"><br><br>
    Resultado: 	<input type="text" name="resultado" > <br><br>

</form>

</body>
</html>
