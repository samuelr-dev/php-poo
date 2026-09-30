<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Temperatura;

echo "--- TESTES ---" . PHP_EOL;

echo "COMUM" . PHP_EOL;
$temperatura1 = new Temperatura(32);
echo $temperatura1->descricao() . PHP_EOL;

echo "NEGATIVA" . PHP_EOL;
$temperatura2 = new Temperatura(-32);
echo $temperatura2->descricao() . PHP_EOL;

echo "ABAIXO DE ZERO ABSOLUTO" . PHP_EOL;
$sucesso = $temperatura1->alterar(-300);

if ($sucesso) {
    echo "Temperatura alterada com sucesso!" . PHP_EOL;
} else {
    echo "Erro: Alteração recusada! Valor abaixo do zero absoluto." . PHP_EOL;
}
echo PHP_EOL;


