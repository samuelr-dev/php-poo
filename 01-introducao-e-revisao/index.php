<?php

// Exercício 1
echo "-- EXERCÍCIO 1 -- " . PHP_EOL; 

$nome = readLine("Digite o seu nome: ");
$idade = readLine("Digite sua idade: ");

echo "$nome" . PHP_EOL;
print("Idade: $idade" . PHP_EOL);

echo "------------------" . PHP_EOL;
// Exercício 2
echo "-- EXERCÍCIO 2 -- " . PHP_EOL; 

$nome = readLine("Digite seu nome: ");
$profissao = readLine("Digite sua profissão: ");
$hobby = readLine("Digite seu hobby: ");

echo "Meu nome é $nome, sou $profissao e gosto de $hobby." . PHP_EOL;

echo "------------------" . PHP_EOL;

// Exercício 3
echo "-- EXERCÍCIO 3 -- " . PHP_EOL;

$num1 = readLine("Digite o 1º número: ");
$num2 = readLine("Digite o 2º número: ");

$soma = $num1 + $num2;
$sub = $num1 - $num2;
$mult = $num1 * $num2;
$div = $num1 / $num2;
$resto = $num1 % $num2;

echo "Soma | $num1 + $num2 = $soma" . PHP_EOL;
echo "Subtração | $num1 - $num2 = $sub" . PHP_EOL;
echo "Multiplicação | $num1 x $num2 = $mult" . PHP_EOL;
echo "Divsão | $num1 / $num2 = $div" . PHP_EOL;
echo "Resto da Divisão | $num1 % $num2 = $resto" . PHP_EOL;

echo "------------------" . PHP_EOL;

// Exercício 4
echo "-- EXERCÍCIO 4 -- " . PHP_EOL;

$idade = readLine("Digite a sua idade: ");

if ($idade >= 18) {
	echo "Você é maior de idade!" . PHP_EOL;
} else {
	echo "Você é menor de idade" . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 5
echo "-- EXERCÍCIO 5 -- " . PHP_EOL;

$nota = readLine("Digite a sua nota (0 a 10): ");

if ($nota >= 7) {
	echo "Aprovado" . PHP_EOL;
} elseif ($nota >= 5) {
	echo "Recuperação" . PHP_EOL;
} else {
	echo "Reprovado" . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 6
echo "-- EXERCÍCIO 6 -- " . PHP_EOL;

$contador = 1;
$numero = readLine("Digite um número: ");

while ($contador <= 10) {
	echo "$numero x $contador = ". $numero * $contador . PHP_EOL;
	$contador++;
}

echo "------------------" . PHP_EOL;

// Exercício 7
echo "-- EXERCÍCIO 7 -- " . PHP_EOL;

for ($i = 2; $i <= 50; $i+=2) {
	echo $i . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 8
echo "-- EXERCÍCIO 8 -- " . PHP_EOL;

for ($i = 1; $i <= 100; $i++) {
	if ($i % 2 == 0) {
		echo $i . " - PAR" . PHP_EOL;
	} else {
		echo $i . " - IMPAR" . PHP_EOL;
	}
}

echo "------------------" . PHP_EOL;

// Exercício 9
echo "-- EXERCÍCIO 9 -- " . PHP_EOL;

$frutas = ["Maça", "Pera", "Uva", "Manga", "Morango"];

foreach ($frutas as $fruta){
    echo $fruta . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 10
echo "-- EXERCÍCIO 10 -- " . PHP_EOL;

$carro = [
        "Marca" => "Honda",
        "Modelo" => "Civic VTi",
        "Ano" => "1998"
         ];

echo "Marca: " . $carro["Marca"] . PHP_EOL;
echo "Modelo: " . $carro["Modelo"] . PHP_EOL;
echo "Ano: " . $carro["Ano"] . PHP_EOL;

echo "------------------" . PHP_EOL;

// Exercício 11
echo "-- EXERCÍCIO 11 -- " . PHP_EOL;

$alunos = [
            ["José", [7.5, 9.0, 8.5]],
            ["Maria", [4.5, 6.0, 7.0]],
            ["Pedro", [3.0, 5.5, 10.0]]
          ];

foreach($alunos as $aluno) {          

$nome = $aluno[0];
$notas = $aluno[1];
$somaNotas = array_sum($notas);
$media = $somaNotas / count($notas);

echo "Aluno: " . $nome . " - Média: " . number_format($media, 2) . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 12
echo "-- EXERCÍCIO 12 -- " . PHP_EOL;

$cidades = ["São Paulo", "Rio de Janeiro", "Belo Horizonte", "Santa Catarina", "Curitiba"];

$cidadeBuscada = readLine("Digite uma cidade: ");

if (in_array($cidadeBuscada, $cidades)) {
    echo $cidadeBuscada . " está na lista!" . PHP_EOL;
} else {
    echo $cidadeBuscada . " não está na lista!" . PHP_EOL;
}

echo "------------------" . PHP_EOL;

// Exercício 13
echo "-- EXERCÍCIO 13 -- " . PHP_EOL;


$nota1 = readLine("Digite a 1ª nota: ");
$nota2 = readLine("Digite a 2ª nota: ");
$nota3 = readLine("Digite a 3ª nota: ");

$mediaFinal = calcularMedia($nota1, $nota2, $nota3);

function calcularMedia($n1, $n2, $n3) {
    $somaNotas = $n1 + $n2 + $n3;
    $media = $somaNotas / 3;
    return $media;
}

echo "A sua média foi de: " . number_format($mediaFinal, 2) . PHP_EOL;

echo "------------------" . PHP_EOL;

// Exercício 14
echo "-- EXERCÍCIO 14 -- " . PHP_EOL;

$idadeUsuario = readLine("Digite a sua idade: ");

$resultadoVerificacao = verificarIdade($idadeUsuario);

function verificarIdade($idade) {
    if ($idade >= 18) {
        return "Maior de Idade" . PHP_EOL;
    } else {
        return "Menor de idade" . PHP_EOL;
    }
}

echo $resultadoVerificacao;

echo "------------------" . PHP_EOL;

// Exercício 15
echo "-- EXERCÍCIO 15 -- " . PHP_EOL;

$listaCompras = [];

while (true) {

    $produto = readLine("Digite o produto que deseja adicionar a lista (escreva 'sair' para encerrar): ");

    if ($produto != "" && $produto != "sair") {
        $listaCompras[] = $produto;
    } elseif ($produto == "sair") {
        echo "*** Programa Encerrado ***" . PHP_EOL;
        break;
    } else {
        echo "Não foi digitado nenhum produto!" . PHP_EOL;
    }

}

if (count($listaCompras) != 0) {
    echo "-- LISTA DE COMPRAS -- ". PHP_EOL;
    foreach ($listaCompras as $produtoLista) {
        echo "- " . $produtoLista . PHP_EOL;
    }
} else {
    echo "**LISTA DE COMPRAS VAZIA**" . PHP_EOL;
}

echo "------------------" . PHP_EOL;
?>