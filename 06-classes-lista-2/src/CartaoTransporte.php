<?php

namespace App;

use InvalidArgumentException;

class CartaoTransporte {

    private float $saldo;
    private int $viagensRealizadas;

    public function __construct(
        public string $titular,
        private float $tarifa
    ) {
        if ($tarifa <= 0) {
            throw new InvalidArgumentException('A tarifa deve ser positiva.');
        }

        $this->saldo = 0;
        $this->viagensRealizadas = 0;
    }

    public function recarregar(float $valor): bool {
        if ($valor <= 0) {
            return false;
        }

        $this->saldo += $valor;
        return true;
    }

    public function embarcar(): bool {
        if ($this->saldo < $this->tarifa) {
            return false;
        }

        $this->saldo -= $this->tarifa;
        $this->viagensRealizadas += 1;
        return true;
    }

    public function saldoAtual(): float {
        return $this->saldo;
    }

    public function viagensRealizadas(): int {
        return $this->viagensRealizadas;
    }

    public function resumo(): string {
        return "Titular: " . $this->titular . " | Saldo: R$" . $this->saldo . " | Viagens: " . $this->viagensRealizadas;
    }
}

?>