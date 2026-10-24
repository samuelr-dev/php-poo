<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Pergunta;
use App\Questionario;

echo "--- TESTES ---" . PHP_EOL;

$questionario = new Questionario("Revisão de POO");
echo "Total de perguntas (questionário novo): " . $questionario->totalPerguntas() . "\n\n";

$questionario->adicionarPergunta(new Pergunta("O que é encapsulamento?", "Proteger o estado interno de um objeto"));
$questionario->adicionarPergunta(new Pergunta("O que é composição?", "Um objeto conter outro objeto"));
$questionario->adicionarPergunta(new Pergunta("O que é um construtor?", "Método que inicializa um objeto"));

echo "Título: " . $questionario->titulo . "\n";
echo "Total de perguntas: " . $questionario->totalPerguntas() . "\n";
echo "Perguntas:\n" . $questionario->listarPerguntas();

echo PHP_EOL;

?>
