<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\IngressoCinema;

echo "--- TESTES ---" . PHP_EOL;

echo "ENTRADA INTEIRA" . PHP_EOL;
$ingresso1 = new IngressoCinema("Gladiador", 25.50, false);
echo $ingresso1->resumo() . PHP_EOL;

echo "MEIA ENTRADA" . PHP_EOL;
$ingresso2 = new IngressoCinema("Gladiador", 25.50, true);
echo $ingresso2->resumo() . PHP_EOL;

echo "--- COMPARAÇÃO ---" . PHP_EOL;

if ($ingresso1->calcularValorFinal() > $ingresso2->calcularValorFinal()) {
    $diferença = $ingresso1->calcularValorFinal() - $ingresso2->calcularValorFinal();
    echo "O Ingresso 1 (Inteira) é mais caro que o Ingresso 2 (Meia)." . PHP_EOL;
    echo "Diferença de valor: R$ " . number_format($diferença, 2, ',', '.') . PHP_EOL;
} else {
    echo "Os ingressos possuem o mesmo valor final." . PHP_EOL;
}

echo PHP_EOL;

?>