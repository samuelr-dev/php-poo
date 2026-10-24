<?php

namespace App;

class Missao {

    private bool $concluida;

    public function __construct(
        public string $titulo,
        public string $descricao,
        private float $recompensa
    ) {
        $this->concluida = false;
    }

    public function estaConcluida(): bool {
        return $this->concluida;
    }

    public function concluir(): bool {
        if ($this->concluida) {
            return false;
        }

        $this->concluida = true;
        return true;
    }

    public function getRecompensa(): float {
        return $this->recompensa;
    }
}

?>
