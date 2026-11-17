<?php

namespace App;

use InvalidArgumentException;

final class Motocicleta extends Veiculo {

    public function __construct(
        string $codigo,
        string $modelo,
        float $valorDiaria,
        private int $cilindrada
    ) {
        parent::__construct($codigo, $modelo, $valorDiaria);

        if ($cilindrada <= 0) {
            throw new InvalidArgumentException('A cilindrada deve ser positiva.');
        }
    }

    public function getCilindrada(): int {
        return $this->cilindrada;
    }

    public function descricao(): string {
        return parent::descricao() . " | Cilindrada: " . $this->cilindrada . "cc";
    }

    protected function calcularValor(int $dias): float {
        $seguroPorDia = 15.00;

        return $dias * ($this->getValorDiaria() + $seguroPorDia);
    }
}

?>
