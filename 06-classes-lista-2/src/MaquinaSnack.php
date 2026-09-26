<?php

namespace App;

use InvalidArgumentException;

class MaquinaSnack {

    private int $estoque;
    private float $credito;

    public function __construct(
        public string $produto,
        private float $preco
    ) {
        if ($preco <= 0) {
            throw new InvalidArgumentException('O preço deve ser positivo.');
        }

        $this->estoque = 0;
        $this->credito = 0;
    }

    public function reabastecer(int $quantidade): bool {
        if ($quantidade <= 0) {
            return false;
        }

        $this->estoque += $quantidade;
        return true;
    }

    public function inserirCredito(float $valor): bool {
        if ($valor <= 0) {
            return false;
        }

        $this->credito += $valor;
        return true;
    }

    public function comprar(): bool {
        if ($this->estoque < 1 || $this->credito < $this->preco) {
            return false;
        }

        $this->estoque -= 1;
        $this->credito -= $this->preco;
        return true;
    }

    public function devolverCredito(): float {
        $valor = $this->credito;
        $this->credito = 0;
        return $valor;
    }

    public function status(): string {
        return "Produto: " . $this->produto . " | Preço: R$" . $this->preco . " | Estoque: " . $this->estoque . " | Crédito: R$" . $this->credito;
    }
}

?>