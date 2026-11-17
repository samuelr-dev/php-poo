<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Carro;
use App\Motocicleta;
use App\Bicicleta;

function moeda(float $valor): string {
    return "R$ " . number_format($valor, 2, ",", ".");
}

echo "--- TESTES ---" . PHP_EOL;

echo "\n--- Cadastro dos veículos ---\n";

$carro = new Carro("C001", "Onix", 100.00, 4);
$moto = new Motocicleta("M001", "CG 160", 60.00, 160);
$bicicleta = new Bicicleta("B001", "Caloi Urbana", 40.00, "urbana");

echo "Veículos cadastrados: carro, motocicleta e bicicleta.\n";
echo "Diária da bicicleta no cadastro: " . moeda($bicicleta->getValorDiaria()) . "\n";

echo "\n--- Lista de veículos (cotação de 3 dias) ---\n";

$veiculos = [$carro, $moto, $bicicleta];

foreach ($veiculos as $veiculo) {
    echo $veiculo->descricao() . "\n";
    echo "Cotação de 3 dias: " . moeda($veiculo->cotar(3)) . "\n\n";
}

echo "--- Desconto da bicicleta ---\n";

echo "Cotação de 6 dias: " . moeda($bicicleta->cotar(6)) . "\n";
echo "Cotação de 7 dias: " . moeda($bicicleta->cotar(7)) . "\n";

echo "\n--- Quantidade de dias inválida ---\n";

try {
    echo "Cotação de 0 dias: " . moeda($carro->cotar(0)) . "\n";
} catch (InvalidArgumentException $e) {
    echo "Cotação de 0 dias rejeitada: " . $e->getMessage() . "\n";
}

try {
    echo "Cotação de -2 dias: " . moeda($moto->cotar(-2)) . "\n";
} catch (InvalidArgumentException $e) {
    echo "Cotação de -2 dias rejeitada: " . $e->getMessage() . "\n";
}

echo "\n--- Cadastros inválidos ---\n";

try {
    new Carro("C002", "Gol", 0, 4);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Diária zero rejeitada: " . $e->getMessage() . "\n";
}

try {
    new Motocicleta("M002", "Biz", -30.00, 110);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Diária negativa rejeitada: " . $e->getMessage() . "\n";
}

try {
    new Carro("", "Gol", 90.00, 4);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Código vazio rejeitado: " . $e->getMessage() . "\n";
}

try {
    new Carro("C003", "Gol", 90.00, 0);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Quantidade de portas inválida rejeitada: " . $e->getMessage() . "\n";
}

try {
    new Motocicleta("M003", "Biz", 50.00, 0);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Cilindrada inválida rejeitada: " . $e->getMessage() . "\n";
}

try {
    new Bicicleta("B002", "Caloi Mountain", 45.00, "mountain");
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Tipo de bicicleta inválido rejeitado: " . $e->getMessage() . "\n";
}

echo "\n--- Dados após as cotações ---\n";

echo $bicicleta->descricao() . "\n";
echo "Diária da bicicleta após as cotações: " . moeda($bicicleta->getValorDiaria()) . "\n";
echo "Diária do carro após as cotações: " . moeda($carro->getValorDiaria()) . "\n";
echo "Diária da motocicleta após as cotações: " . moeda($moto->getValorDiaria()) . "\n";

echo PHP_EOL;

?>
