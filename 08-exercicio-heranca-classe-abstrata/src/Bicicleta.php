<?php

namespace App;

use InvalidArgumentException;

final class Bicicleta extends Veiculo {

    public function __construct(
        string $codigo,
        string $modelo,
        float $valorDiaria,
        private string $tipo
    ) {
        parent::__construct($codigo, $modelo, $valorDiaria);

        if ($tipo != "urbana" && $tipo != "elétrica") {
            throw new InvalidArgumentException('O tipo da bicicleta deve ser "urbana" ou "elétrica".');
        }
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function descricao(): string {
        return parent::descricao() . " | Tipo: " . $this->tipo;
    }

    protected function calcularValor(int $dias): float {
        $total = $dias * $this->getValorDiaria();

        if ($dias >= 7) {
            $total = $total * 0.90;
        }

        return $total;
    }
}

?>
