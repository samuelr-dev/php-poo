<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Equipamento;
use App\Mochila;
use App\Aventureiro;

echo "--- TESTES ---" . PHP_EOL;

$mochila = new Mochila(10);
$aventureiro = new Aventureiro("Elric", 100, $mochila);

echo "Mochila inicial:\n" . $mochila->listarEquipamentos();
echo "Peso ocupado: " . $mochila->pesoOcupado() . " | Espaço restante: " . $mochila->espacoRestante() . "\n\n";

$aventureiro->coletarEquipamento(new Equipamento("Espada Curta", 4, 50));
$aventureiro->coletarEquipamento(new Equipamento("Poção de Cura", 1, 10));

echo "Mochila após coletar 2 itens:\n" . $mochila->listarEquipamentos();
echo "Peso ocupado: " . $mochila->pesoOcupado() . " | Espaço restante: " . $mochila->espacoRestante() . "\n";
echo "Valor total: " . $mochila->valorTotal() . "\n\n";

$semEspaco = $aventureiro->coletarEquipamento(new Equipamento("Armadura Pesada", 8, 200));
echo "Tentativa de coletar item maior que o espaço restante: " . ($semEspaco ? "Aceita" : "Rejeitada") . "\n";
echo "Peso ocupado após a tentativa: " . $mochila->pesoOcupado() . "\n\n";

$descarteInexistente = $aventureiro->descartarEquipamento("Escudo");
echo "Tentativa de descartar item inexistente: " . ($descarteInexistente ? "Aceita" : "Rejeitada") . "\n";

$aventureiro->descartarEquipamento("Espada Curta");
echo "Mochila após descartar a Espada Curta:\n" . $mochila->listarEquipamentos();
echo "Espaço restante: " . $mochila->espacoRestante() . "\n";

echo "\n--- Equipamento com peso negativo ---\n";

try {
    new Equipamento("Item Inválido", -2, 10);
    echo "Não deveria chegar aqui.\n";
} catch (InvalidArgumentException $e) {
    echo "Exceção capturada: " . $e->getMessage() . "\n";
}

echo PHP_EOL;

?>
