<?php

namespace App;

use InvalidArgumentException;

class Estudante {

    public function __construct(
        public string $nome,
        public string $ra,
        private float $notaFinal
    ) {
        if ($notaFinal < 0 || $notaFinal > 10) {
            throw new InvalidArgumentException('A nota final deve estar entre 0 e 10.');
        }
    }

    public function getNotaFinal(): float {
        return $this->notaFinal;
    }

    public function foiAprovado(): bool {
        return $this->notaFinal >= 6.0;
    }
}

?>
