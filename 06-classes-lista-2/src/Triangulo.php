<?php

namespace App;

use InvalidArgumentException;

class Triangulo {

    private float $ladoA;
    private float $ladoB;
    private float $ladoC;

    public function __construct(float $ladoA, float $ladoB, float $ladoC) {
        if ($ladoA <= 0 || $ladoB <= 0 || $ladoC <= 0) {
            throw new InvalidArgumentException('Todos os lados devem ser maiores que zero.');
        }

        $this->ladoA = $ladoA;
        $this->ladoB = $ladoB;
        $this->ladoC = $ladoC;
    }

    public function ehValido(): bool {
        return $this->ladoA < $this->ladoB + $this->ladoC
            && $this->ladoB < $this->ladoA + $this->ladoC
            && $this->ladoC < $this->ladoA + $this->ladoB;
    }

    public function classificar(): string {
        if (!$this->ehValido()) {
            return 'Inválido';
        }

        if ($this->ladoA == $this->ladoB && $this->ladoB == $this->ladoC) {
            return 'Equilátero';
        }

        if ($this->ladoA == $this->ladoB || $this->ladoB == $this->ladoC || $this->ladoA == $this->ladoC) {
            return 'Isósceles';
        }

        return 'Escaleno';
    }

    public function perimetro(): float {
        if (!$this->ehValido()) {
            throw new InvalidArgumentException('Não é possível calcular o perímetro de um triângulo inválido.');
        }

        return $this->ladoA + $this->ladoB + $this->ladoC;
    }
}

?>