<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Semaforo;

echo "--- TESTES ---" . PHP_EOL;

$semaforo = new Semaforo('Avenida Principal');
echo $semaforo->estado() . "\n";

for ($i = 1; $i <= 7; $i++) {
    $semaforo->avancar();
    echo "Avanço " . $i . " -> " . $semaforo->estado() . " | Pode passar: " . ($semaforo->podePassar() ? 'Sim' : 'Não') . "\n";
}

echo PHP_EOL;

?>