<?php

namespace App;

class PacoteEntrega {

    private string $status;
    private int $tentativas;

    public function __construct(
        public string $codigo,
        public string $destino
    ) {
        $this->status = 'aguardando';
        $this->tentativas = 0;
    }

    public function sairParaEntrega(): bool {
        if ($this->status != 'aguardando') {
            return false;
        }

        $this->status = 'em rota';
        return true;
    }

    public function registrarFalha(): bool {
        if ($this->status != 'em rota') {
            return false;
        }

        $this->tentativas += 1;

        if ($this->tentativas >= 3) {
            $this->status = 'devolução';
        } else {
            $this->status = 'aguardando';
        }

        return true;
    }

    public function confirmarEntrega(): bool {
        if ($this->status != 'em rota') {
            return false;
        }

        $this->status = 'entregue';
        return true;
    }

    public function statusAtual(): string {
        return "Código: " . $this->codigo . " | Destino: " . $this->destino . " | Status: " . $this->status . " | Tentativas: " . $this->tentativas;
    }
}

?>