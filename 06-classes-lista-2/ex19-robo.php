<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\RoboArena;

echo "--- TESTES ---" . PHP_EOL;

$robo1 = new RoboArena('Titan');
$robo2 = new RoboArena('Blitz');

echo $robo1->status() . "\n";
echo $robo2->status() . "\n";

echo "\n--- Treino e combate ---\n";

$robo1->treinar();
echo "Após treinar: " . $robo1->status() . "\n";

$robo1->participarCombate();
echo "Após combate: " . $robo1->status() . "\n";

echo "\n--- Levando o robô ao limite ---\n";

$robo1->participarCombate();
echo "Após 2º combate: " . $robo1->status() . "\n";

$combateSemIntegridade = $robo1->participarCombate();
echo "Tentativa de combate com integridade zerada: " . ($combateSemIntegridade ? 'Sucesso' : 'Recusada') . " | " . $robo1->status() . "\n";

echo "\n--- Reparo e recarga ---\n";

$robo1->repararIntegridade(50);
$robo1->recarregar(40);
echo "Após reparo e recarga: " . $robo1->status() . "\n";

echo "\n--- Treino sem energia suficiente ---\n";

for ($i = 1; $i <= 4; $i++) {
    $robo1->treinar();
}
$treinoSemEnergia = $robo1->treinar();
echo "Tentativa de treinar sem energia suficiente: " . ($treinoSemEnergia ? 'Sucesso' : 'Recusada') . " | " . $robo1->status() . "\n";

echo PHP_EOL;

?>