<?php

namespace App;

class Ingresso {

    public function __construct(
        public string $espectador,
        public int $poltrona,
        public float $valorPago
    ) {}
}

?>
