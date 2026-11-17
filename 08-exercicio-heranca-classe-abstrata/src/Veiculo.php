<?php

namespace App;

use InvalidArgumentException;

abstract class Veiculo {

    public function __construct(
        private string $codigo,
        private string $modelo,
        private float $valorDiaria
    ) {
        if (trim($codigo) == "") {
            throw new InvalidArgumentException('O código do veículo não pode ser vazio.');
        }

        if (trim($modelo) == "") {
            throw new InvalidArgumentException('O modelo do veículo não pode ser vazio.');
        }

        if ($valorDiaria <= 0) {
            throw new InvalidArgumentException('O valor da diária deve ser maior que zero.');
        }
    }

    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getValorDiaria(): float {
        return $this->valorDiaria;
    }

    public function descricao(): string {
        return "Código: " . $this->codigo . " | Modelo: " . $this->modelo;
    }

    final public function cotar(int $dias): float {
        if ($dias <= 0) {
            throw new InvalidArgumentException('A quantidade de dias deve ser um número inteiro positivo.');
        }

        return $this->calcularValor($dias);
    }

    abstract protected function calcularValor(int $dias): float;
}

?>
