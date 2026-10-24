<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Produto;
use App\Carrinho;

echo "--- TESTES ---" . PHP_EOL;

$carrinho = new Carrinho();
echo "Carrinho vazio: " . $carrinho->listarItens() . "\n";
echo "Valor total: R$" . $carrinho->valorTotal() . "\n\n";

$carrinho->adicionarProduto(new Produto("Teclado Mecânico", 250.00, "P001"));
$carrinho->adicionarProduto(new Produto("Mouse Gamer", 120.00, "P002"));

echo "Itens após adicionar dois produtos:\n" . $carrinho->listarItens();
echo "Valor total: R$" . $carrinho->valorTotal() . "\n\n";

$duplicado = $carrinho->adicionarProduto(new Produto("Teclado Mecânico", 250.00, "P001"));
echo "Tentativa de adicionar o mesmo produto de novo: " . ($duplicado ? "Aceita" : "Rejeitada") . "\n";
echo "Total de itens após a tentativa: " . $carrinho->totalItens() . "\n\n";

$carrinho->removerProduto("P002");
echo "Itens após remover o Mouse Gamer:\n" . $carrinho->listarItens();
echo "Valor total: R$" . $carrinho->valorTotal() . "\n";

echo "\n--- Produto com preço negativo ---\n";

try {
    new Produto("Produto Inválido", -10, "P003");
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Exceção capturada: " . $e->getMessage() . "\n";
}

echo PHP_EOL;

?>
