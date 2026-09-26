<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\CofrinhoMeta;

echo "--- TESTES ---" . PHP_EOL;

$cofrinho = new CofrinhoMeta('Viagem', 1000);
echo $cofrinho->resumo() . "\n";

$cofrinho->depositar(300);
echo "Após depositar 300: " . $cofrinho->resumo() . "\n";

$retiradaInvalida = $cofrinho->retirar(500);
echo "Tentativa de retirar 500 (saldo insuficiente): " . ($retiradaInvalida ? 'Aceita' : 'Rejeitada') . " | " . $cofrinho->resumo() . "\n";

$cofrinho->retirar(100);
echo "Após retirar 100: " . $cofrinho->resumo() . "\n";

$cofrinho->depositar(800);
echo "Após depositar 800: " . $cofrinho->resumo() . "\n";
echo "Meta atingida? " . ($cofrinho->metaAtingida() ? 'Sim' : 'Não') . "\n";

echo "\n--- Depósito inválido ---\n";

$depositoInvalido = $cofrinho->depositar(-50);
echo "Tentativa de depositar -50: " . ($depositoInvalido ? 'Aceita' : 'Rejeitada') . " | " . $cofrinho->resumo() . "\n";

echo PHP_EOL;

?>