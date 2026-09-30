<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\LampadaInteligente;

echo "--- TESTES ---" . PHP_EOL;

$sala = new LampadaInteligente('Sala');
$quarto = new LampadaInteligente('Quarto');

echo "Estado inicial:\n";
echo $sala->status() . "\n";
echo $quarto->status() . "\n";

$sala->ligar();
$sala->ajustarIntensidade(80);
echo "\nApós ligar e ajustar a sala:\n";
echo $sala->status() . "\n";

$quarto->ligar();
$quarto->desligar();
echo "\nApós ligar e desligar o quarto:\n";
echo $quarto->status() . "\n";

echo "\n--- Valores inválidos ---\n";

$tentativaNegativa = $sala->ajustarIntensidade(-10);
echo "Ajustar para -10: " . ($tentativaNegativa ? 'Aceito' : 'Rejeitado') . " | " . $sala->status() . "\n";

$tentativaAlta = $sala->ajustarIntensidade(150);
echo "Ajustar para 150: " . ($tentativaAlta ? 'Aceito' : 'Rejeitado') . " | " . $sala->status() . "\n";

echo PHP_EOL;

?>