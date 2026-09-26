<?php

namespace App;

class Semaforo {

    private string $cor;
    private int $ciclosCompletos;

    public function __construct(
        public string $local
    ) {
        $this->cor = 'vermelho';
        $this->ciclosCompletos = 0;
    }

    public function avancar(): void {
        if ($this->cor == 'vermelho') {
            $this->cor = 'verde';
        } elseif ($this->cor == 'verde') {
            $this->cor = 'amarelo';
        } elseif ($this->cor == 'amarelo') {
            $this->cor = 'vermelho';
            $this->ciclosCompletos += 1;
        }
    }

    public function podePassar(): bool {
        return $this->cor == 'verde';
    }

    public function estado(): string {
        return "Local: " . $this->local . " | Cor: " . $this->cor . " | Ciclos completos: " . $this->ciclosCompletos;
    }
}

?>