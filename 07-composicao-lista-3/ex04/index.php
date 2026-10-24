<?php

// Nome completo: Samuel Rodrigues
// RA: 2211715
// Turma: C - BCC
// Disciplina: Programação Orientada a Objetos

require_once __DIR__ . '/vendor/autoload.php';

use App\Livro;
use App\Biblioteca;

echo "--- TESTES ---" . PHP_EOL;

$biblioteca = new Biblioteca();

$biblioteca->cadastrarLivro(new Livro("Clean Code", "Robert Martin", "ISBN001"));
$biblioteca->cadastrarLivro(new Livro("O Programador Pragmático", "Andrew Hunt", "ISBN002"));

echo "Catálogo inicial:\n" . $biblioteca->catalogo() . "\n";

$isbnDuplicado = $biblioteca->cadastrarLivro(new Livro("Clean Code (cópia)", "Robert Martin", "ISBN001"));
echo "Tentativa de cadastrar o mesmo ISBN de novo: " . ($isbnDuplicado ? "Aceita" : "Rejeitada") . "\n\n";

$biblioteca->emprestarLivro("ISBN001");
echo "Catálogo após emprestar o Clean Code:\n" . $biblioteca->catalogo() . "\n";

$emprestimoRepetido = $biblioteca->emprestarLivro("ISBN001");
echo "Tentativa de emprestar o mesmo livro de novo: " . ($emprestimoRepetido ? "Aceita" : "Rejeitada") . "\n";

$emprestimoInexistente = $biblioteca->emprestarLivro("ISBN999");
echo "Tentativa de emprestar um ISBN inexistente: " . ($emprestimoInexistente ? "Aceita" : "Rejeitada") . "\n\n";

$biblioteca->devolverLivro("ISBN001");
echo "Catálogo após a devolução:\n" . $biblioteca->catalogo();

echo PHP_EOL;

?>
