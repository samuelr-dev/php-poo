<?php

namespace App;

use InvalidArgumentException;

class BateriaDispositivo {

    private int $carga;

    public function __construct(
        public string $dispositivo,
        int $cargaInicial
    ) {
        if ($cargaInicial < 0 || $cargaInicial > 100) {
            throw new InvalidArgumentException('A carga inicial deve estar entre 0 e 100.');
        }

        $this->carga = $cargaInicial;
    }

    public function usar(int $minutos): bool {
        if ($this->carga <= 0) {
            return false;
        }

        if ($minutos <= 0) {
            return false;
        }

        $blocos = (int) ($minutos / 5);

        if ($minutos % 5 != 0) {
            $blocos += 1;
        }

        if ($blocos <= $this->carga) {
            $this->carga -= $blocos;
            return true;
        }

        $this->carga = 0;
        return false;
    }

    public function carregar(int $percentual): int {
        if ($percentual <= 0) {
            return 0;
        }

        $adicionado = $percentual;

        if ($this->carga + $adicionado > 100) {
            $adicionado = 100 - $this->carga;
        }

        $this->carga += $adicionado;
        return $adicionado;
    }

    public function nivel(): int {
        return $this->carga;
    }

    public function estaCritica(): bool {
        return $this->carga <= 15;
    }

    public function status(): string {
        return "Dispositivo: " . $this->dispositivo . " | Nível: " . $this->carga . "%";
    }
}

?>