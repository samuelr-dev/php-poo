<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Atividade;
use App\AcompanhamentoDisciplina;
use App\Estudante;

echo "--- TESTES ---" . PHP_EOL;

$acompanhamento = new AcompanhamentoDisciplina("Programação Orientada a Objetos", 80);
$estudante = new Estudante("Samuel Rodrigues", "RA001", $acompanhamento);

echo "Desempenho sem atividades: " . $estudante->consultarDesempenho() . "\n";
echo "Não avaliadas sem atividades: " . $acompanhamento->atividadesNaoAvaliadas() . "\n\n";

$prova1 = new Atividade("Prova 1", 10);
$trabalho1 = new Atividade("Trabalho 1", 10);

$acompanhamento->adicionarAtividade($prova1);
$acompanhamento->adicionarAtividade($trabalho1);

$tituloDuplicado = $acompanhamento->adicionarAtividade(new Atividade("Prova 1", 10));
echo "Tentativa de cadastrar atividade com título repetido: " . ($tituloDuplicado ? "Aceita" : "Rejeitada") . "\n\n";

echo "Não avaliadas antes da correção:\n" . $acompanhamento->atividadesNaoAvaliadas();
echo "Desempenho antes da correção: " . $estudante->consultarDesempenho() . "\n\n";

$prova1->registrarNota(8);
$trabalho1->registrarNota(10);

echo "Não avaliadas após a correção: " . $acompanhamento->atividadesNaoAvaliadas() . "\n";
echo "Desempenho após a correção: " . $estudante->consultarDesempenho() . "\n\n";

$notaForaDoLimite = $trabalho1->registrarNota(15);
echo "Tentativa de registrar nota acima do valor máximo: " . ($notaForaDoLimite ? "Aceita" : "Rejeitada") . "\n";
echo "Desempenho sem alteração: " . $estudante->consultarDesempenho() . "\n";

echo PHP_EOL;

?>
