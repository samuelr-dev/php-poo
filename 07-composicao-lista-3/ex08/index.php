<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Ingresso;
use App\Sessao;

echo "--- TESTES ---" . PHP_EOL;

$sessao = new Sessao("Duna: Parte Três", 5);

echo "Sessão recém-criada:\n" . $sessao->listarOcupadas();
echo "Poltronas disponíveis: " . $sessao->poltronasDisponiveis() . "\n";
echo "Arrecadação: R$" . $sessao->arrecadacaoTotal() . "\n\n";

$sessao->venderIngresso(new Ingresso("Samuel", 3, 25.00));
$sessao->venderIngresso(new Ingresso("Maria", 4, 25.00));

echo "Poltronas ocupadas:\n" . $sessao->listarOcupadas();
echo "Poltronas disponíveis: " . $sessao->poltronasDisponiveis() . "\n";
echo "Arrecadação: R$" . $sessao->arrecadacaoTotal() . "\n\n";

$poltronaRepetida = $sessao->venderIngresso(new Ingresso("João", 3, 25.00));
echo "Tentativa de vender a poltrona 3 de novo: " . ($poltronaRepetida ? "Aceita" : "Rejeitada") . "\n";

$poltronaInexistente = $sessao->venderIngresso(new Ingresso("Ana", 99, 25.00));
echo "Tentativa de vender a poltrona 99 (inexistente): " . ($poltronaInexistente ? "Aceita" : "Rejeitada") . "\n";

echo "\nArrecadação final: R$" . $sessao->arrecadacaoTotal() . "\n";

echo PHP_EOL;

?>
