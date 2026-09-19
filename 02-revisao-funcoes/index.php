<?php

## Exercício 1
function saudar(string $nome) {
    echo "Olá " . $nome . "! Seja bem-vindo(a)" . PHP_EOL;
}

echo "-- Exercício 1 --". PHP_EOL;
$nomeUsuario = readLine("Digite o seu nome: ");

saudar($nomeUsuario);
echo "-----------------". PHP_EOL;

## Exercício 2
function dobrar(float $numero) {
    return $numero * 2;
}

echo "-- Exercício 2 --". PHP_EOL;
$numeroDigitado = (float) readline("Digite um número: ");

$dobro = dobrar($numeroDigitado);
echo "O dobro de " . $numeroDigitado .  " equivale a: " . $dobro . PHP_EOL;

echo "-----------------". PHP_EOL;

## Exercício 3
function somar(float $num1, float $num2) {
    $soma = $num1 + $num2;
    echo "SOMA: " . $num1 . " + " . $num2 . " = " . $soma . PHP_EOL;
}

echo "-- Exercício 3 --". PHP_EOL;
$numero1 = (float) readline("Digite o 1º número: ");
$numero2 = (float) readline("Digite o 2º número: ");

somar($numero1, $numero2);

echo "-----------------". PHP_EOL;

## Exercício 4
function mensagem(string $texto = "Sem mensagem") {
    echo $texto . PHP_EOL;
}

echo "-- Exercício 4 --". PHP_EOL;

mensagem("Programação Orientada a Objetos");

echo "-----------------". PHP_EOL;
## Exercício 5
function quadrado(float $num) {
    return $num ** 2;
}

function mostrarQuadrado(float $num) {
    $resultado = quadrado($num);
    echo "O quadrado de " . $num . " é: " . $resultado . PHP_EOL;
}

echo "-- Exercício 5 --". PHP_EOL;

$numDigitado = (float) readline("Digite um número: ");
mostrarQuadrado($numDigitado);

echo "-----------------". PHP_EOL;

## Exercício 6
function contarElementos(array $lista) {
    echo "A lista tem: " . count($lista) . " elementos." . PHP_EOL;
}

echo "-- Exercício 6 --". PHP_EOL;

$frutas = ["Maça", "Pera", "Uva", "Manga", "Amora"];
contarElementos($frutas);

echo "-----------------". PHP_EOL;

## Exercício 7
function verificarAprovacao(float $mediaFinal) {
    
    if ($mediaFinal >= 7) {
        echo "Aprovado" . PHP_EOL;
    }
    elseif ($mediaFinal >= 5) {
        echo "Recuperação" . PHP_EOL;
    }
    else {
        echo "Reprovado" . PHP_EOL;
    }
}

echo "-- Exercício 7 --". PHP_EOL;

$mediaAluno = (float) readline("Digite a sua media final: ");
verificarAprovacao($mediaAluno);

echo "-----------------". PHP_EOL;

## Exercício 8
function separarParesEImpares(array $listaNum) {
    $listaSeparada = [
                    "Pares" => [],
                    "Impares" => []
                    ];

    foreach ($listaNum as $num) {
        if ($num % 2 == 0) {
            $listaSeparada["Pares"][] = $num;
        } else {
            $listaSeparada["Impares"][] = $num;
        }
    }

    return $listaSeparada;
}

function criarArrayNumeros(int $limite) {
    $listaNumeros = [];

    for ($i = 0; $i <= $limite; $i++) {
        $listaNumeros[] = $i;
    }
    
    return $listaNumeros;
}

echo "-- Exercício 8 --". PHP_EOL;

$limiteNum = (int) readline("Digite o valor máximo da lista de números: ");

$listaNumeros = criarArrayNumeros($limiteNum);
$listaParesEImpares = separarParesEImpares($listaNumeros);

foreach ($listaParesEImpares as $tipo => $numeros) {
    echo "$tipo: ";

    foreach ($numeros as $numero) {
        echo $numero . " ";
    }

    echo PHP_EOL;
}

echo "-----------------". PHP_EOL;

## Exercício 9
function calcularMedia(float $nota1, float $nota2, float $nota3) {
    return ($nota1 + $nota2 + $nota3) / 3;
}

function resultadoAluno(string $nome, float $nota1, float $nota2, float $nota3) {
    $media = calcularMedia($nota1, $nota2, $nota3);

    if ($media >= 7) {
        $situacao = "APROVADO";
    }
    elseif ($media >= 5) {
        $situacao = "de RECUPERAÇÃO";
    }
    else {
        $situacao = "REPROVADO";
    }

    echo "O aluno $nome obteve média " . number_format($media, 2) . " e está $situacao!" . PHP_EOL;
}


echo "-- Exercício 9 --". PHP_EOL;

$nomeAluno = readline("Digite o seu nome: ");
$nota1 = (float) readline("Digite a 1ª nota: ");
$nota2 = (float) readline("Digite a 2ª nota: ");
$nota3 = (float) readline("Digite a 3ª nota: ");

resultadoAluno($nomeAluno, $nota1, $nota2, $nota3);

echo "-----------------". PHP_EOL;

## Exercício 10
function exibirProdutos(array $produtos) {
    
    echo "-- PRODUTOS --" . PHP_EOL;

    printf("%-8s %-12s %-8s %-10s\n", "CÓDIGO", "PRODUTO", "VALOR", "QUANTIDADE");

    for ($i = 0; $i < count($produtos); $i++) {

        printf(
            "%-8s %-12s %-8s %-10s\n",
            ($i + 1) . " -",
            $produtos[$i]["nome"],
            number_format($produtos[$i]["preco"], 2, ",", "."),
            $produtos[$i]["quantidade"]
        );
    }
}

function calcularSubtotal(float $preco, int $quantidade) {
    return $preco * $quantidade;
}

function calcularTotalCompra(array $itens) {

    $total = 0;

    foreach ($itens as $item) {

        $subtotal = calcularSubtotal(
            $item["preco"],
            $item["quantidade"]
        );

        $total += $subtotal;
    }

    return $total;
}

function aplicarDesconto(float $total, bool $possuiFidelidade) {

    if ($possuiFidelidade) {
        return $total * 0.90;
    }

    return $total;
}

function gerarCupom(array $itens, bool $possuiFidelidade) {

    echo PHP_EOL;
    echo "========== CUPOM FISCAL ==========" . PHP_EOL;

    printf(
        "%-12s %-8s %-10s %-10s\n",
        "PRODUTO",
        "PREÇO",
        "QTD",
        "SUBTOTAL"
    );

    foreach ($itens as $item) {

        $subtotal = calcularSubtotal(
            $item["preco"],
            $item["quantidade"]
        );

        printf(
            "%-12s %-8s %-10s %-10s\n",
            $item["nome"],
            number_format($item["preco"], 2, ",", "."),
            $item["quantidade"],
            number_format($subtotal, 2, ",", ".")
        );
    }

    $totalBruto = calcularTotalCompra($itens);
    $totalFinal = aplicarDesconto($totalBruto,$possuiFidelidade);
    $desconto = $totalBruto - $totalFinal;

    echo "----------------------------------" . PHP_EOL;

    echo "Valor total bruto: R$ "
        . number_format($totalBruto, 2, ",", ".")
        . PHP_EOL;

    if ($possuiFidelidade) {

        echo "Desconto: R$ "
            . number_format($desconto, 2, ",", ".")
            . PHP_EOL;
    }

    echo "Valor final: R$ "
        . number_format($totalFinal, 2, ",", ".")
        . PHP_EOL;

    echo "==================================" . PHP_EOL;
}


echo "-- Exercício 10 --" . PHP_EOL;

$produtosEstoque = [
    ["nome" => "Chocolate", "preco" => 5.50, "quantidade" => 20],
    ["nome" => "Bolacha", "preco" => 3.50, "quantidade" => 15],
    ["nome" => "Manga", "preco" => 2.50, "quantidade" => 30],
    ["nome" => "Arroz", "preco" => 4.80, "quantidade" => 20],
    ["nome" => "Feijão", "preco" => 2.90, "quantidade" => 25],
];

$pedido = [];
$possuiFidelidade = false;

while (true) {

    echo PHP_EOL;
    echo "-- MENU --" . PHP_EOL;

    printf(
        "0 - Encerrar Programa\n" .
        "1 - Exibir Produtos\n" .
        "2 - Realizar Pedido\n" .
        "3 - Finalizar Pedido\n"
    );

    $option = (int) readline("Selecione uma das opções: ");

    switch ($option) {

        case 0:
            echo "Programa Encerrado" . PHP_EOL;
            break 2;

        case 1:
            exibirProdutos($produtosEstoque);
            break;

        case 2:
            exibirProdutos($produtosEstoque);

            $codigo = (int) readline("Digite o código do produto: ");

            if ($codigo < 1 || $codigo > count($produtosEstoque)) {

                echo "Código inválido!" . PHP_EOL;
                break;
            }

            $produto = $produtosEstoque[$codigo - 1];

            $quantidade = (int) readline(
                "Digite a quantidade desejada: "
            );

            if ($quantidade <= 0) {

                echo "Quantidade inválida!" . PHP_EOL;
                break;
            }

            if ($quantidade > $produto["quantidade"]) {

                echo "Quantidade indisponível em estoque!" . PHP_EOL;
                break;
            }

            $pedido[] = [
                "nome" => $produto["nome"],
                "preco" => $produto["preco"],
                "quantidade" => $quantidade
            ];

            echo "Produto adicionado ao pedido!" . PHP_EOL;
            break;

        case 3:
            if (count($pedido) == 0) {

                echo "Nenhum produto foi adicionado ao pedido!" . PHP_EOL;
                break;
            }

            $resposta = readline(
                "Possui cartão fidelidade? (s/n): "
            );

            if ($resposta == "s" || $resposta == "S") {
                $possuiFidelidade = true;
            }

            gerarCupom($pedido, $possuiFidelidade);
            break 2;

        default:
            echo "Você não selecionou nenhuma opção válida!" . PHP_EOL;
            break;
    }
}

echo "-----------------" . PHP_EOL;
?>