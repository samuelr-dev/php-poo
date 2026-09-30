<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\CronometroTreino;

echo "--- TESTES ---" . PHP_EOL;

$cronometro = new CronometroTreino('Corrida');

$cronometro->adicionarTempo(1500);
$cronometro->adicionarTempo(900);
$cronometro->adicionarTempo(300);

echo "Atividade: {$cronometro->atividade}\n";
echo "Tempo total em minutos: {$cronometro->totalMinutos()}\n";
echo "Tempo formatado: {$cronometro->formatarTempo()}\n";

$cronometro->zerar();

echo "\nApós zerar:\n";
echo "Tempo total em minutos: {$cronometro->totalMinutos()}\n";
echo "Tempo formatado: {$cronometro->formatarTempo()}\n";

echo PHP_EOL;

?>