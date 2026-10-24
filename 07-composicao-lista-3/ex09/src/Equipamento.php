<?php

namespace App;

use InvalidArgumentException;

class Equipamento {

    public function __construct(
        public string $nome,
        public float $peso,
        public float $valor
    ) {
        if ($peso < 0 || $valor < 0) {
            throw new InvalidArgumentException('O peso e o valor não podem ser negativos.');
        }
    }
}

?>
