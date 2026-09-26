<?php

namespace App;

use InvalidArgumentException;

class CofrinhoMeta {

    private float $saldo;

    public function __construct(
        public string $objetivo,
        private float $meta
    ) {
        if ($meta <= 0) {
            throw new InvalidArgumentException('A meta deve ser maior que zero.');
        }

        $this->saldo = 0;
    }

    public function depositar(float $valor): bool {
        if ($valor <= 0) {
            return false;
        }

        $this->saldo += $valor;
        return true;
    }

    public function retirar(float $valor): bool {
        if ($valor <= 0 || $valor > $this->saldo) {
            return false;
        }

        $this->saldo -= $valor;
        return true;
    }

    public function percentualDaMeta(): float {
        return ($this->saldo / $this->meta) * 100;
    }

    public function metaAtingida(): bool {
        return $this->saldo >= $this->meta;
    }

    public function resumo(): string {
        return "Objetivo: " . $this->objetivo . " | Saldo: R$" . $this->saldo . " | Meta: R$" . $this->meta . " | Progresso: " . $this->percentualDaMeta() . "%";
    }
}

?>