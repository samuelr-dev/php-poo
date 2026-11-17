<?php

namespace App;

use InvalidArgumentException;

final class Carro extends Veiculo {

    public function __construct(
        string $codigo,
        string $modelo,
        float $valorDiaria,
        private int $portas
    ) {
        parent::__construct($codigo, $modelo, $valorDiaria);

        if ($portas <= 0) {
            throw new InvalidArgumentException('A quantidade de portas deve ser positiva.');
        }
    }

    public function getPortas(): int {
        return $this->portas;
    }

    public function descricao(): string {
        return parent::descricao() . " | Portas: " . $this->portas;
    }

    protected function calcularValor(int $dias): float {
        $taxaLimpeza = 50.00;

        return ($dias * $this->getValorDiaria()) + $taxaLimpeza;
    }
}

?>
