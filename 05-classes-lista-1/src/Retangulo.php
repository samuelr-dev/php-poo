<?php

namespace App;

use InvalidArgumentException;

class Retangulo 
{
    private float $largura; private float $altura;

    public function __construct(float $largura,float $altura) {
        $this->validarDimensoes($largura, $altura);
        $this->largura = $largura;
        $this->altura = $altura;

    }

    private function validarDimensoes(float $largura, float $altura): void {
        if($largura <= 0 || $altura <= 0) {
            throw new InvalidArgumentException("As dimensões da forma não podem ser negativas ou iguais a 0");
        }
    }

    public function areaRetangulo(): float {
        $area = $this->largura * $this->altura;
        return $area;
    }

    public function perimetroRetangulo(): float {
        $perimetro = 2 * ($this->largura + $this->altura);
        return $perimetro;
    }

    public function ehQuadrado(): bool {
        return $this->largura == $this->altura;
    }

    public function redimensionar(float $largura, float $altura): void {
        $this->validarDimensoes($largura, $altura);
        $this->largura = $largura;
        $this->altura = $altura;
    }
}

?>