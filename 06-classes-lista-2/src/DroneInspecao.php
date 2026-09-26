<?php

namespace App;

class DroneInspecao {

    private int $bateria;
    private float $distanciaTotal;
    private bool $emVoo;

    public function __construct(
        public string $modelo
    ) {
        $this->bateria = 0;
        $this->distanciaTotal = 0;
        $this->emVoo = false;
    }

    public function decolar(): bool {
        if ($this->bateria < 20 || $this->emVoo) {
            return false;
        }

        $this->emVoo = true;
        return true;
    }

    public function voar(float $km): bool {
        if (!$this->emVoo || $km <= 0) {
            return false;
        }

        $custoTotal = $km * 5;

        if ($custoTotal <= $this->bateria) {
            $this->bateria -= $custoTotal;
            $this->distanciaTotal += $km;
            return true;
        }

        $kmPossivel = $this->bateria / 5;
        $this->distanciaTotal += $kmPossivel;
        $this->bateria = 0;
        return false;
    }

    public function pousar(): bool {
        if (!$this->emVoo) {
            return false;
        }

        $this->emVoo = false;
        return true;
    }

    public function recarregar(int $percentual): int {
        if ($percentual <= 0) {
            return 0;
        }

        $adicionado = $percentual;

        if ($this->bateria + $adicionado > 100) {
            $adicionado = 100 - $this->bateria;
        }

        $this->bateria += $adicionado;
        return $adicionado;
    }

    public function status(): string {
        $situacao = $this->emVoo ? 'Em voo' : 'Pousado';
        return "Modelo: " . $this->modelo . " | Bateria: " . $this->bateria . "% | Distância total: " . $this->distanciaTotal . "km | Situação: " . $situacao;
    }
}

?>