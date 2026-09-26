<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\MaquinaSnack;

echo "--- TESTES ---" . PHP_EOL;

$maquina = new MaquinaSnack('Chocolate', 4.50);
echo $maquina->status() . "\n";

$compraSemEstoque = $maquina->comprar();
echo "Tentativa de compra sem estoque: " . ($compraSemEstoque ? 'Sucesso' : 'Falhou') . " | " . $maquina->status() . "\n";

$maquina->reabastecer(5);
echo "\nApós reabastecer 5: " . $maquina->status() . "\n";

$compraSemCredito = $maquina->comprar();
echo "Tentativa de compra sem crédito suficiente: " . ($compraSemCredito ? 'Sucesso' : 'Falhou') . " | " . $maquina->status() . "\n";

$maquina->inserirCredito(4.50);
echo "\nApós inserir R$4,50 de crédito: " . $maquina->status() . "\n";

$compraOk = $maquina->comprar();
echo "Compra bem-sucedida: " . ($compraOk ? 'Sucesso' : 'Falhou') . " | " . $maquina->status() . "\n";

echo "\n--- Crédito excedente ---\n";

$maquina->inserirCredito(10);
echo "Após inserir R$10 a mais: " . $maquina->status() . "\n";

$valorDevolvido = $maquina->devolverCredito();
echo "Valor devolvido: R$" . $valorDevolvido . " | " . $maquina->status() . "\n";

echo PHP_EOL;

?>