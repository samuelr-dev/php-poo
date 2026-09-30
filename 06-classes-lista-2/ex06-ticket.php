<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\TicketEstacionamento;

echo "--- TESTES ---" . PHP_EOL;

$ticket40 = new TicketEstacionamento('ABC1234', 0, 10);
$ticket40->registrarSaida(40);
echo $ticket40->resumo() . "\n";

$ticket60 = new TicketEstacionamento('DEF5678', 0, 10);
$ticket60->registrarSaida(60);
echo $ticket60->resumo() . "\n";

$ticket125 = new TicketEstacionamento('GHI9012', 0, 10);
$ticket125->registrarSaida(125);
echo $ticket125->resumo() . "\n";

echo "\n--- Regras ---\n";

$ticketRegistrado = new TicketEstacionamento('JKL3456', 0, 10);
$ticketRegistrado->registrarSaida(50);
$segundoRegistro = $ticketRegistrado->registrarSaida(90);
echo "Tentativa de registrar saída duas vezes: " . ($segundoRegistro ? 'Aceita' : 'Rejeitada') . "\n";

$ticketInvalido = new TicketEstacionamento('MNO7890', 30, 10);
$saidaInvalida = $ticketInvalido->registrarSaida(20);
echo "Saída anterior à entrada: " . ($saidaInvalida ? 'Aceita' : 'Rejeitada') . "\n";
echo "Duração antes de sair com sucesso: " . $ticketInvalido->duracaoMin() . " min\n";

echo PHP_EOL;

?>