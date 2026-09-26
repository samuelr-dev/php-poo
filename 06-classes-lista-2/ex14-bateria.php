<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\BateriaDispositivo;

echo "--- TESTES ---" . PHP_EOL;

$bateria = new BateriaDispositivo('Celular', 50);
echo $bateria->status() . "\n";

$bateria->usar(12);
echo "Após usar 12 min (3 blocos de 5): " . $bateria->status() . "\n";

$bateria->usar(20);
echo "Após usar 20 min (4 blocos de 5): " . $bateria->status() . "\n";

echo "Bateria crítica? " . ($bateria->estaCritica() ? 'Sim' : 'Não') . "\n";

echo "\n--- Carga acima de 100% ---\n";

$adicionado = $bateria->carregar(80);
echo "Tentativa de carregar 80: adicionado " . $adicionado . " | " . $bateria->status() . "\n";

echo "\n--- Uso sem carga ---\n";

$bateriaVazia = new BateriaDispositivo('Fone', 3);
$usoQueEsvazia = $bateriaVazia->usar(30);
echo "Uso de 30 min com apenas 3% de carga: " . ($usoQueEsvazia ? 'Sucesso' : 'Falhou') . " | " . $bateriaVazia->status() . "\n";

$usoComCargaZero = $bateriaVazia->usar(5);
echo "Tentativa de uso com carga em 0: " . ($usoComCargaZero ? 'Sucesso' : 'Falhou') . " | " . $bateriaVazia->status() . "\n";

echo PHP_EOL;

?>