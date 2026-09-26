<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\CompartimentoLocker;

echo "--- TESTES ---" . PHP_EOL;

$locker = new CompartimentoLocker('A12');
echo $locker->status() . "\n";

$locker->receberEncomenda('ENC001', '4321');
echo "Após receber encomenda: " . $locker->status() . "\n";

echo "\n--- Tentativas com código incorreto ---\n";

for ($i = 1; $i <= 3; $i++) {
    $resultado = $locker->retirar('0000');
    echo "Tentativa " . $i . " (código errado): " . ($resultado ? 'Sucesso' : 'Falhou') . " | " . $locker->status() . "\n";
}

echo "\n--- Compartimento bloqueado ---\n";

$retiradaCorreta = $locker->retirar('4321');
echo "Tentativa com código correto após bloqueio: " . ($retiradaCorreta ? 'Sucesso' : 'Falhou') . " | " . $locker->status() . "\n";

$locker->desbloquear();
echo "Após desbloquear: " . $locker->status() . "\n";

echo "\n--- Retirada válida em um novo ciclo ---\n";

$locker->receberEncomenda('ENC002', '9999');
$retiradaValida = $locker->retirar('9999');
echo "Retirada com código correto: " . ($retiradaValida ? 'Sucesso' : 'Falhou') . " | " . $locker->status() . "\n";

echo PHP_EOL;

?>