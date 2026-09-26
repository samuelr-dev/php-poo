<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\CartaoTransporte;

echo "--- TESTES ---" . PHP_EOL;

$cartao = new CartaoTransporte('Samuel', 5.50);
echo $cartao->resumo() . "\n";

$cartao->recarregar(20);
echo "Após recarregar 20: " . $cartao->resumo() . "\n";

$cartao->embarcar();
echo "Após 1º embarque: " . $cartao->resumo() . "\n";

$cartao->embarcar();
echo "Após 2º embarque: " . $cartao->resumo() . "\n";

$embarqueInsuficiente = $cartao->embarcar();
echo "Tentativa de embarque com saldo insuficiente: " . ($embarqueInsuficiente ? 'Sucesso' : 'Falhou') . " | " . $cartao->resumo() . "\n";

echo "Total de viagens: " . $cartao->viagensRealizadas() . "\n";

echo PHP_EOL;

?>