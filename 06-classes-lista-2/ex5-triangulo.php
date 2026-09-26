<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Triangulo;

echo "--- TESTES ---" . PHP_EOL;

$equilatero = new Triangulo(5, 5, 5);
echo "Equilátero -> {$equilatero->classificar()}, perímetro: {$equilatero->perimetro()}\n";

$escaleno = new Triangulo(3, 4, 5);
echo "Escaleno -> {$escaleno->classificar()}, perímetro: {$escaleno->perimetro()}\n";

$isosceles = new Triangulo(4, 4, 6);
echo "Isósceles -> {$isosceles->classificar()}, perímetro: {$isosceles->perimetro()}\n";

$invalido = new Triangulo(1, 2, 10);
echo "Inválido -> {$invalido->classificar()}\n";
echo "É válido? " . ($invalido->ehValido() ? 'Sim' : 'Não') . "\n";


echo PHP_EOL;

?>