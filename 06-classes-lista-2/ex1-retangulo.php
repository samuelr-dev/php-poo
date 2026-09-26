<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Retangulo;

echo "---TESTES---" . PHP_EOL;

$retangulo1 = new Retangulo(5.50, 5.50);
$retangulo2 = new Retangulo(3.50, 4.70);

echo "RETANGULO 1:" . PHP_EOL;

echo "Area: " . $retangulo1->areaRetangulo() . " m" . PHP_EOL;
echo "Perímetro: " . $retangulo1->perimetroRetangulo() . " m" . PHP_EOL;
echo "É quadrado?: " . ($retangulo1->ehQuadrado() ? 'Sim' : 'Não') . PHP_EOL;

echo "------------" . PHP_EOL;

echo "RETANGULO 2:" . PHP_EOL;

echo "Area: " . $retangulo2->areaRetangulo() . " m" . PHP_EOL;
echo "Perímetro: " . $retangulo2->perimetroRetangulo() . " m" . PHP_EOL;
echo "É quadrado?: " . ($retangulo2->ehQuadrado() ? 'Sim' : 'Não') . PHP_EOL;
?>