<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Estudante;
use App\Turma;

echo "--- TESTES ---" . PHP_EOL;

$turma = new Turma("BCC-C", 3);

echo "Média geral (turma vazia): " . $turma->mediaGeral() . "\n";
echo "Relação (turma vazia): " . $turma->relacaoEstudantes() . "\n\n";

$turma->matricular(new Estudante("Ana", "RA001", 8.5));
$turma->matricular(new Estudante("Bruno", "RA002", 5.0));

echo "Relação após 2 matrículas:\n" . $turma->relacaoEstudantes();
echo "Média geral: " . $turma->mediaGeral() . "\n";
echo "Total de aprovados: " . $turma->totalAprovados() . "\n\n";

$raRepetido = $turma->matricular(new Estudante("Ana Duplicada", "RA001", 7.0));
echo "Tentativa de matricular RA repetido: " . ($raRepetido ? "Aceita" : "Rejeitada") . "\n";
echo "Total de matriculados após a tentativa: " . $turma->totalMatriculados() . "\n\n";

$turma->matricular(new Estudante("Carla", "RA003", 9.0));
echo "Relação após preencher a capacidade (3 vagas):\n" . $turma->relacaoEstudantes();

$capacidadeExcedida = $turma->matricular(new Estudante("Diego", "RA004", 6.0));
echo "Tentativa de matricular além da capacidade: " . ($capacidadeExcedida ? "Aceita" : "Rejeitada") . "\n";

echo PHP_EOL;

?>
