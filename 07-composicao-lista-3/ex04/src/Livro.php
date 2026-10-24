<?php

namespace App;

class Livro {

    private bool $disponivel;

    public function __construct(
        public string $titulo,
        public string $autor,
        public string $isbn
    ) {
        $this->disponivel = true;
    }

    public function estaDisponivel(): bool {
        return $this->disponivel;
    }

    public function emprestar(): bool {
        if (!$this->disponivel) {
            return false;
        }

        $this->disponivel = false;
        return true;
    }

    public function devolver(): bool {
        if ($this->disponivel) {
            return false;
        }

        $this->disponivel = true;
        return true;
    }
}

?>
