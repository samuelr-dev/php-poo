<?php

namespace App;

class LampadaInteligente {

    private bool $ligada;
    private int $intensidade;

    public function __construct(
        public string $comodo
    ) {
        $this->ligada = false;
        $this->intensidade = 50;
    }

    public function ligar(): void {
        $this->ligada = true;
    }

    public function desligar(): void {
        $this->ligada = false;
    }

    public function ajustarIntensidade(int $valor): bool {
        if ($valor < 0 || $valor > 100) {
            return false;
        }

        $this->intensidade = $valor;
        return true;
    }

    public function status(): string {
        $estadoLigada = $this->ligada ? 'Ligada' : 'Desligada';
        return "Cômodo: " . $this->comodo . " | Estado: " . $estadoLigada . " | Intensidade: " . $this->intensidade;
    }
}

?>