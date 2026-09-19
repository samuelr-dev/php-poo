<?php
// DESAFIO 1
echo "-- DESAFIO 1 --" . PHP_EOL;

$matrizQtd = [
    [2, 5, 3],
    [1, 0, 4],
    [7, 2, 1] ];

$qtdTotal = 0;
$maiorQtd = -1;
$linhaMaior = 0;
$colunaMaior = 0;

foreach ($matrizQtd as $i => $linha) {

    foreach ($linha as $j => $quantidade) {
        $qtdTotal += $quantidade;

        if ($quantidade > $maiorQtd) {
            $maiorQtd = $quantidade;
            $linhaMaior = $i + 1;
            $colunaMaior = $j + 1;
        }
    }
}

echo "Quantidade Total: $qtdTotal" . PHP_EOL;
echo "Maior Quantidade: $maiorQtd na posição ($linhaMaior, $colunaMaior)" . PHP_EOL;

echo "---------------" . PHP_EOL;

// DESAFIO 2
echo "-- DESAFIO 2 --" . PHP_EOL;

$matrizAssentos = [
    [1, 1, 0, 1, 1],
    [1, 0, 0, 1, 1],
    [1, 1, 1, 1, 0],
    [0, 1, 1, 1, 1] ,
    [1, 1, 1, 1, 1]];

$lugaresDisponiveis = 0;
$primeiraLinha = null;
$primeiraColuna = null;

foreach ($matrizAssentos as $i => $linha) {

    foreach ($linha as $j => $assento) {

        if ($assento ==  0) {
            $lugaresDisponiveis += 1;

            if ($primeiraLinha == NULL) {
                $primeiraLinha = $i + 1;
                $primeiraColuna = $j + 1;
            }
        }
    }
}

echo "Lugares Disponíveis: $lugaresDisponiveis" . PHP_EOL;

if ($primeiraLinha !== null) {
    echo "Primeiro lugar vazio: ($primeiraLinha,$primeiraColuna)" . PHP_EOL;
} else {
    echo "Não há lugares vazios." . PHP_EOL;
}

echo "---------------" . PHP_EOL;

// DESAFIO 3
echo "-- DESAFIO 3 --" . PHP_EOL;

$matrizSudoku = [
    [2, 9, 4],
    [7, 5, 3],
    [6, 1, 8]];

$valido = true;
$numerosEncontrados = [];

foreach ($matrizSudoku as $i => $linha) {

    foreach ($linha as $j => $numero) {

        if ($numero < 1 || $numero > 9) {
            $valido = false;
        }

        if (in_array($numero, $numerosEncontrados)) {
            $valido = false;
        } else {
            $numerosEncontrados[] = $numero;
        }
    }
}

if ($valido) {
    echo "Sudoku válido" . PHP_EOL;
} else {
    echo "Sudoku inválido" . PHP_EOL;
}

echo "---------------" . PHP_EOL;

// DESAFIO 4
echo "-- DESAFIO 4 --" . PHP_EOL;

$arrayNumeros = [10, 20, 30, 40, 50];
$x = 30;
$posicaoEncontrada = -1;

foreach ($arrayNumeros as $i => $numero) {

    if ($numero == $x) {
        $posicaoEncontrada = $i + 1;
        break;
    }
}

if ($posicaoEncontrada !== -1) {
    echo "Encontrado na posição $posicaoEncontrada" . PHP_EOL;
} else {
    echo "$x não encontrado no array" . PHP_EOL;
}

echo "---------------" . PHP_EOL;
?>