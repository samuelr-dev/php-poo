<?php

namespace App;

use InvalidArgumentException;

class Atividade {

    private ?float $nota = null;

    public function __construct(
        public string $titulo,
        private float $valorMaximo
    ) {
        if ($valorMaximo <= 0) {
            throw new InvalidArgumentException('O valor máximo deve ser maior que zero.');
        }
    }

    public function foiAvaliada(): bool {
        return $this->nota !== null;
    }

    public function registrarNota(float $nota): bool {
        if ($nota < 0 || $nota > $this->valorMaximo) {
            return false;
        }

        $this->nota = $nota;
        return true;
    }

    public function getNota(): float {
        if ($this->nota === null) {
            return 0;
        }

        return $this->nota;
    }

    public function getValorMaximo(): float {
        return $this->valorMaximo;
    }
}

?>
