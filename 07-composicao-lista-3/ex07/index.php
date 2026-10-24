<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Veiculo;
use App\Estacionamento;

echo "--- TESTES ---" . PHP_EOL;

$estacionamento = new Estacionamento(2);

echo "Vagas livres (vazio): " . $estacionamento->vagasLivres() . "\n\n";

$estacionamento->registrarEntrada(new Veiculo("ABC1234", "Civic", "Samuel"));
echo "Após 1ª entrada, vagas livres: " . $estacionamento->vagasLivres() . "\n";

$placaRepetida = $estacionamento->registrarEntrada(new Veiculo("ABC1234", "Onix", "Outro motorista"));
echo "Tentativa de entrada com a mesma placa: " . ($placaRepetida ? "Aceita" : "Rejeitada") . "\n\n";

$estacionamento->registrarEntrada(new Veiculo("DEF5678", "Corolla", "Maria"));
echo "Após 2ª entrada, vagas livres: " . $estacionamento->vagasLivres() . "\n";

$lotado = $estacionamento->registrarEntrada(new Veiculo("GHI9012", "HB20", "João"));
echo "Tentativa de entrada com o estacionamento lotado: " . ($lotado ? "Aceita" : "Rejeitada") . "\n\n";

$encontrado = $estacionamento->buscarPorPlaca("DEF5678");
echo "Veículo da placa DEF5678: " . ($encontrado !== null ? $encontrado->modelo . " (" . $encontrado->proprietario . ")" : "Não encontrado") . "\n";

$saidaInexistente = $estacionamento->registrarSaida("ZZZ0000");
echo "Tentativa de saída de placa não registrada: " . ($saidaInexistente ? "Aceita" : "Rejeitada") . "\n\n";

$estacionamento->registrarSaida("ABC1234");
echo "Após a saída de ABC1234, vagas livres: " . $estacionamento->vagasLivres() . "\n";

echo PHP_EOL;

?>
