<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Hidrometro;

echo "--- TESTES ---" . PHP_EOL;

$hidrometro = new Hidrometro('Apto 12', 100);
echo $hidrometro->resumo() . "\n";

$hidrometro->registrarLeitura(115);
echo "Após 1ª leitura (115): " . $hidrometro->resumo() . "\n";
echo "Conta estimada (preço R$4,50/m³): R$" . $hidrometro->estimarConta(4.50) . "\n";

$hidrometro->registrarLeitura(130);
echo "\nApós 2ª leitura (130): " . $hidrometro->resumo() . "\n";
echo "Conta estimada (preço R$4,50/m³): R$" . $hidrometro->estimarConta(4.50) . "\n";

$hidrometro->registrarLeitura(150);
echo "\nApós 3ª leitura (150): " . $hidrometro->resumo() . "\n";
echo "Conta estimada (preço R$4,50/m³): R$" . $hidrometro->estimarConta(4.50) . "\n";

echo "\n--- Leitura inválida ---\n";

$leituraInvalida = $hidrometro->registrarLeitura(140);
echo "Tentativa de registrar leitura menor que a atual (140): " . ($leituraInvalida ? 'Aceita' : 'Rejeitada') . " | " . $hidrometro->resumo() . "\n";

echo PHP_EOL;

?>