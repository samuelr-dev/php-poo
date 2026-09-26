<?php

namespace App;

use InvalidArgumentException;

class TicketEstacionamento {

    private ?int $saidaMin = null;

    public function __construct(
        public string $placa,
        private int $entradaMin,
        private float $tarifaHora
    ) {
        if ($tarifaHora <= 0) {
            throw new InvalidArgumentException('A tarifa por hora deve ser positiva.');
        }
    }

    public function registrarSaida(int $minuto): bool {
        if ($this->saidaMin !== null) {
            return false;
        }

        if ($minuto <= $this->entradaMin) {
            return false;
        }

        $this->saidaMin = $minuto;
        return true;
    }

    public function duracaoMin(): int {
        if ($this->saidaMin === null) {
            return 0;
        }

        return $this->saidaMin - $this->entradaMin;
    }

    public function valorAPagar(): float {
        $duracao = $this->duracaoMin();

        if ($duracao <= 0) {
            return 0;
        }

        $horas = (int) ($duracao / 60);
        $resto = $duracao % 60;

        if ($resto > 0) {
            $horas += 1;
        }

        return $horas * $this->tarifaHora;
    }

    public function resumo(): string {
        return "Placa: " . $this->placa . " | Duração: " . $this->duracaoMin() . " min | Valor: R$" . $this->valorAPagar();
    }
}

?>