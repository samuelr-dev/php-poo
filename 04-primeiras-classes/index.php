<?php

require_once __DIR__ .'/vendor/autoload.php';

use App\Pessoa;
use App\Produto;
use App\Aluno;


$pessoa1 = new Pessoa('João', '25');
echo $pessoa1->apresentarPessoa() . PHP_EOL;

$aluno1 = new Aluno('Ricardo', '2341512', 'BCC', "3º");
echo $aluno1->apresentarAluno() . PHP_EOL;

$produto1 = new Produto('Caderno', 'Escolar', 'Tilibra', 22.50);
echo $produto1->apresentarProduto() . PHP_EOL;
?>