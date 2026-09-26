<?php

namespace App;

use InvalidArgumentException;

class PlanoDados {

    private float $saldoGB;
    private float $consumoTotalGB;

    public function __construct(
        public string $cliente,
        private float $franquiaGB
    ) {
        if ($franquiaGB <= 0) {
            throw new InvalidArgumentException('A franquia deve ser maior que zero.');
        }

        $this->saldoGB = $franquiaGB;
        $this->consumoTotalGB = 0;
    }

    public function consumir(float $gb): bool {
        if ($gb <= 0) {
            return false;
        }

        if ($gb > $this->saldoGB) {
            return false;
        }

        $this->saldoGB -= $gb;
        $this->consumoTotalGB += $gb;
        return true;
    }

    public function comprarPacoteAdicional(float $gb): bool {
        if ($gb <= 0) {
            return false;
        }

        $this->saldoGB += $gb;
        return true;
    }

    public function saldoRestante(): float {
        return $this->saldoGB;
    }

    public function consumoTotal(): float {
        return $this->consumoTotalGB;
    }

    public function status(): string {
        return "Cliente: " . $this->cliente . " | Franquia: " . $this->franquiaGB . "GB | Saldo: " . $this->saldoGB . "GB | Consumo total: " . $this->consumoTotalGB . "GB";
    }
}

?>