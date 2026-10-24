<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Missao;
use App\RegistroMissoes;

echo "--- TESTES ---" . PHP_EOL;

$registro = new RegistroMissoes();

echo "Total de moedas (sem missões): R$" . $registro->totalMoedasConcluidas() . "\n";
echo "Pendentes (sem missões): " . $registro->missoesPendentes() . "\n";

$missao1 = new Missao("Caçada ao Dragão", "Derrotar o dragão da montanha", 100);
$missao2 = new Missao("Entrega Urgente", "Levar a carta ao reino vizinho", 30);
$missao3 = new Missao("Resgate", "Salvar o aldeão perdido na floresta", 50);

$registro->adicionarMissao($missao1);
$registro->adicionarMissao($missao2);
$registro->adicionarMissao($missao3);

echo "\nPendentes após cadastrar 3 missões:\n" . $registro->missoesPendentes();

$missao2->concluir();
echo "\nPendentes após concluir 'Entrega Urgente':\n" . $registro->missoesPendentes();
echo "Total de moedas concluídas: R$" . $registro->totalMoedasConcluidas() . "\n";

$concluirDeNovo = $missao2->concluir();
echo "\nTentativa de concluir a mesma missão de novo: " . ($concluirDeNovo ? "Aceita" : "Rejeitada") . "\n";
echo "Total de moedas concluídas (sem mudança): R$" . $registro->totalMoedasConcluidas() . "\n";

echo PHP_EOL;

?>
