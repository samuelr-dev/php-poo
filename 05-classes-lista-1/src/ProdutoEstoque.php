<?php

namespace App;
use InvalidArgumentException;

class ProdutoEstoque
{
    private string $nomeProduto;
    private float $precoProduto;
    private int $estoqueProduto;

    public function __construct(string $nomeProduto, float $precoProduto, int $estoqueProduto) {
        $this->verificarDados($nomeProduto, $precoProduto, $estoqueProduto);

        $this->nomeProduto = trim($nomeProduto);
        $this->precoProduto = $precoProduto;
        $this->estoqueProduto = $estoqueProduto;
    }

    private function verificarDados(string $nomeProduto, float $precoProduto, int $estoqueProduto): void {
        if (trim($nomeProduto) === '') {
            throw new InvalidArgumentException("O campo nome do produto não pode estar vazio");
        }
        if ($precoProduto <= 0) {
            throw new InvalidArgumentException("O preço do produto tem que ser maior que 0");
        }
        if ($estoqueProduto < 0) {
            throw new InvalidArgumentException("O estoque inicial não pode ser menor que 0");
        }
    }

    public function aplicarDesconto(float $percentual): void {
        if ($percentual <= 0 || $percentual > 50) {
            throw new InvalidArgumentException("O desconto tem de ser maior que 0 e no máximo 50%");
        }

        $this->precoProduto -= $this->precoProduto * ($percentual / 100);

    }

    public function repor(int $quantidade): void {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException("A quantidade tem que ser maior que 0");
        }

        $this->estoqueProduto += $quantidade;
    }

    public function reservar(int $quantidade): void {
        if ($quantidade <= 0 || $quantidade > $this->estoqueProduto) {
            throw new InvalidArgumentException("A quantidade tem que ser maior que 0 e não pode ser superior ao estoque disponível");
        }

        $this->estoqueProduto -= $quantidade;
    }

    public function consultarPreco(): float {
        return $this->precoProduto;
    }

    public function consultarEstoque(): int {
        return $this->estoqueProduto;
    }


    public function consultarProduto(): string  {
        return "PRODUTO: $this->nomeProduto" . PHP_EOL 
        . "VALOR: R$ " . number_format($this->precoProduto, 2, ',', '.') . PHP_EOL
        . "ESTOQUE: $this->estoqueProduto unidades" . PHP_EOL;
    }


}

?>