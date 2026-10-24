<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Jogador;
use App\Time;

echo "--- TESTES ---" . PHP_EOL;

$time = new Time("Tigres FC");

$time->cadastrarJogador(new Jogador("Carlos", 10, "Atacante"));
$time->cadastrarJogador(new Jogador("Marcos", 1, "Goleiro"));
$time->cadastrarJogador(new Jogador("Paulo", 7, "Meio-campo"));

echo "Total de jogadores: " . $time->totalJogadores() . "\n";
echo "Escalação:\n" . $time->escalacaoCompleta() . "\n";

$numeroRepetido = $time->cadastrarJogador(new Jogador("Pedro", 10, "Zagueiro"));
echo "Tentativa de cadastrar a camisa 10 de novo: " . ($numeroRepetido ? "Aceita" : "Rejeitada") . "\n";
echo "Total de jogadores após a tentativa: " . $time->totalJogadores() . "\n\n";

$encontrado = $time->buscarPorNumero(7);
echo "Jogador da camisa 7: " . ($encontrado !== null ? $encontrado->nome : "Não encontrado") . "\n";

$naoEncontrado = $time->buscarPorNumero(99);
echo "Jogador da camisa 99: " . ($naoEncontrado !== null ? $naoEncontrado->nome : "Não encontrado") . "\n";

echo PHP_EOL;

?>
