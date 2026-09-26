<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\PacoteEntrega;

echo "--- TESTES ---" . PHP_EOL;

echo "--- Cenário 1: entrega na primeira tentativa ---\n";

$pacote1 = new PacoteEntrega('PAC001', 'Marília - SP');
echo $pacote1->statusAtual() . "\n";

$pacote1->sairParaEntrega();
echo "Após sair para entrega: " . $pacote1->statusAtual() . "\n";

$pacote1->confirmarEntrega();
echo "Após confirmar entrega: " . $pacote1->statusAtual() . "\n";

echo "\n--- Cenário 2: falhas sucessivas até devolução ---\n";

$pacote2 = new PacoteEntrega('PAC002', 'Assis - SP');

for ($i = 1; $i <= 3; $i++) {
    $pacote2->sairParaEntrega();
    $pacote2->registrarFalha();
    echo "Tentativa " . $i . " -> " . $pacote2->statusAtual() . "\n";
}

echo "\n--- Bloqueio de uma quarta tentativa ---\n";

$quartaTentativa = $pacote2->sairParaEntrega();
echo "Tentativa de sair para entrega após devolução: " . ($quartaTentativa ? 'Aceita' : 'Rejeitada') . " | " . $pacote2->statusAtual() . "\n";

echo PHP_EOL;

?>