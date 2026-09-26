<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\PersonagemRPG;

echo "--- TESTES ---" . PHP_EOL;

$personagem = new PersonagemRPG('Aragorn', 'Guerreiro');
echo $personagem->status() . "\n";

$personagem->receberDano(30);
echo "Após receber 30 de dano: " . $personagem->status() . "\n";

$personagem->curar(15);
echo "Após curar 15: " . $personagem->status() . "\n";

$personagem->usarHabilidade(40);
echo "Após usar habilidade (custo 40): " . $personagem->status() . "\n";

$semEnergia = $personagem->usarHabilidade(999);
echo "Tentativa de habilidade sem energia suficiente: " . ($semEnergia ? 'Sucesso' : 'Falhou') . " | " . $personagem->status() . "\n";

$personagem->descansar(50);
echo "Após descansar 50: " . $personagem->status() . "\n";

echo "\n--- Personagem sem vida ---\n";

$personagem->receberDano(200);
echo $personagem->status() . "\n";

$habilidadeSemVida = $personagem->usarHabilidade(10);
echo "Tentativa de habilidade com vida 0: " . ($habilidadeSemVida ? 'Sucesso' : 'Falhou') . "\n";

echo PHP_EOL;

?>