<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\DroneInspecao;

echo "--- TESTES ---" . PHP_EOL;

$drone = new DroneInspecao('Phantom X');
echo $drone->status() . "\n";

$decolagemSemBateria = $drone->decolar();
echo "Tentativa de decolagem com pouca bateria: " . ($decolagemSemBateria ? 'Sucesso' : 'Falhou') . "\n";

$drone->recarregar(60);
echo "\nApós recarregar 60%: " . $drone->status() . "\n";

$drone->decolar();
echo "Após decolar: " . $drone->status() . "\n";

$drone->voar(5);
echo "Após voar 5km (25% da bateria): " . $drone->status() . "\n";

echo "\n--- Bateria insuficiente para a distância pedida ---\n";

$voarLonge = $drone->voar(10);
echo "Tentativa de voar 10km: " . ($voarLonge ? 'Completo' : 'Parcial') . " | " . $drone->status() . "\n";

$drone->pousar();
echo "\nApós pousar: " . $drone->status() . "\n";

echo "\n--- Recarga acima do limite ---\n";

$adicionado = $drone->recarregar(50);
echo "Tentativa de recarregar 50%: adicionado " . $adicionado . "% | " . $drone->status() . "\n";

echo PHP_EOL;

?>