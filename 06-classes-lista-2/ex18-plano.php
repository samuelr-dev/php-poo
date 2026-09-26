<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\PlanoDados;

echo "--- TESTES ---" . PHP_EOL;

$planoBasico = new PlanoDados('Samuel', 5);
$planoFamilia = new PlanoDados('Família Silva', 15);

echo $planoBasico->status() . "\n";
echo $planoFamilia->status() . "\n";

echo "\n--- Consumos válidos ---\n";

$planoBasico->consumir(2);
echo "Após consumir 2GB: " . $planoBasico->status() . "\n";

$planoFamilia->consumir(10);
echo "Após consumir 10GB: " . $planoFamilia->status() . "\n";

echo "\n--- Consumo maior que o saldo ---\n";

$consumoExcedente = $planoBasico->consumir(10);
echo "Tentativa de consumir 10GB com saldo de 3GB: " . ($consumoExcedente ? 'Sucesso' : 'Falhou') . " | " . $planoBasico->status() . "\n";

echo "\n--- Compra de pacote adicional ---\n";

$planoBasico->comprarPacoteAdicional(5);
echo "Após comprar pacote de 5GB: " . $planoBasico->status() . "\n";

$consumoAposCompra = $planoBasico->consumir(6);
echo "Consumo de 6GB após o pacote: " . ($consumoAposCompra ? 'Sucesso' : 'Falhou') . " | " . $planoBasico->status() . "\n";

echo PHP_EOL;

?>