<?php

namespace App;

use InvalidArgumentException;

class Hidrometro {

    private float $leituraAnterior;
    private float $leituraAtual;

    public function __construct(
        public string $identificacao,
        float $leituraInicial
    ) {
        if ($leituraInicial < 0) {
            throw new InvalidArgumentException('A leitura inicial não pode ser negativa.');
        }

        $this->leituraAnterior = $leituraInicial;
        $this->leituraAtual = $leituraInicial;
    }

    public function registrarLeitura(float $novaLeitura): bool {
        if ($novaLeitura < 0) {
            return false;
        }

        if ($novaLeitura < $this->leituraAtual) {
            return false;
        }

        $this->leituraAnterior = $this->leituraAtual;
        $this->leituraAtual = $novaLeitura;
        return true;
    }

    public function consumoUltimoPeriodo(): float {
        return $this->leituraAtual - $this->leituraAnterior;
    }

    public function estimarConta(float $precoPorM3): float {
        if ($precoPorM3 < 0) {
            return 0;
        }

        return $this->consumoUltimoPeriodo() * $precoPorM3;
    }

    public function resumo(): string {
        return "Identificação: " . $this->identificacao . " | Leitura anterior: " . $this->leituraAnterior . " | Leitura atual: " . $this->leituraAtual . " | Consumo: " . $this->consumoUltimoPeriodo();
    }
}

?>