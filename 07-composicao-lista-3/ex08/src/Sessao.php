<?php

namespace App;

class Sessao {

    private array $ingressos;

    public function __construct(
        public string $filme,
        private int $totalPoltronas
    ) {
        $this->ingressos = [];
    }

    public function venderIngresso(Ingresso $ingresso): bool {
        if ($ingresso->poltrona < 1 || $ingresso->poltrona > $this->totalPoltronas) {
            return false;
        }

        if ($this->poltronaOcupada($ingresso->poltrona)) {
            return false;
        }

        $this->ingressos[] = $ingresso;
        return true;
    }

    public function poltronaOcupada(int $poltrona): bool {
        foreach ($this->ingressos as $ingresso) {
            if ($ingresso->poltrona == $poltrona) {
                return true;
            }
        }

        return false;
    }

    public function poltronasDisponiveis(): int {
        return $this->totalPoltronas - count($this->ingressos);
    }

    public function arrecadacaoTotal(): float {
        $total = 0;

        foreach ($this->ingressos as $ingresso) {
            $total += $ingresso->valorPago;
        }

        return $total;
    }

    public function listarOcupadas(): string {
        if (count($this->ingressos) == 0) {
            return "Nenhuma poltrona ocupada.\n";
        }

        $lista = "";

        foreach ($this->ingressos as $ingresso) {
            $lista .= "Poltrona " . $ingresso->poltrona . " - " . $ingresso->espectador . "\n";
        }

        return $lista;
    }
}

?>
