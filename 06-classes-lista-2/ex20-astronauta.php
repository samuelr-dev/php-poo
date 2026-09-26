<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\AstronautaMarte;

echo "--- TESTES ---" . PHP_EOL;

$astronauta = new AstronautaMarte('Ripley', 2);
echo $astronauta->resumo() . "\n";

echo "\n--- Exploração e descanso ---\n";

$astronauta->explorar(20, 15);
echo "Após explorar: " . $astronauta->resumo() . "\n";

$astronauta->descansar(10);
echo "Após descansar: " . $astronauta->resumo() . "\n";

echo "\n--- Condição crítica ---\n";

$astronauta->sofrerIncidente(100);
echo "Após incidente grave: " . $astronauta->resumo() . "\n";

$explorarFerido = $astronauta->explorar(10, 10);
echo "Tentativa de explorar com vida zerada: " . ($explorarFerido ? 'Sucesso' : 'Recusada') . " | " . $astronauta->resumo() . "\n";

echo "\n--- Recuperação ---\n";

$astronauta->tratarFerimentos(80);
echo "Após tratar ferimentos: " . $astronauta->resumo() . "\n";

$astronauta->explorar(30, 90);
echo "Após explorar de novo: " . $astronauta->resumo() . "\n";

echo "\n--- Ordem inadequada de ações ---\n";

$astronauta->utilizarCilindro(50);
echo "Após usar cilindro (1ª carga): " . $astronauta->resumo() . "\n";

$astronauta->utilizarCilindro(50);
echo "Após usar cilindro (2ª carga): " . $astronauta->resumo() . "\n";

$cilindroSemCarga = $astronauta->utilizarCilindro(50);
echo "Tentativa de usar cilindro sem cargas restantes: " . ($cilindroSemCarga ? 'Sucesso' : 'Recusada') . " | " . $astronauta->resumo() . "\n";

echo PHP_EOL;

?>