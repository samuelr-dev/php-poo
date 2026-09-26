<?php

namespace App;

class CompartimentoLocker {

    private ?string $identificacaoEncomenda = null;
    private ?string $codigoRetirada = null;
    private int $tentativasIncorretas = 0;
    private bool $bloqueado = false;

    public function __construct(
        public string $numero
    ) {}

    public function receberEncomenda(string $identificacao, string $codigo): bool {
        if ($this->bloqueado) {
            return false;
        }

        if ($this->identificacaoEncomenda !== null) {
            return false;
        }

        $this->identificacaoEncomenda = $identificacao;
        $this->codigoRetirada = $codigo;
        $this->tentativasIncorretas = 0;
        return true;
    }

    public function retirar(string $codigoInformado): bool {
        if ($this->bloqueado) {
            return false;
        }

        if ($this->identificacaoEncomenda === null) {
            return false;
        }

        if ($codigoInformado == $this->codigoRetirada) {
            $this->identificacaoEncomenda = null;
            $this->codigoRetirada = null;
            $this->tentativasIncorretas = 0;
            return true;
        }

        $this->tentativasIncorretas += 1;

        if ($this->tentativasIncorretas >= 3) {
            $this->bloqueado = true;
        }

        return false;
    }

    public function desbloquear(): bool {
        if (!$this->bloqueado) {
            return false;
        }

        $this->bloqueado = false;
        $this->tentativasIncorretas = 0;
        return true;
    }

    public function status(): string {
        if ($this->bloqueado) {
            $situacao = 'Bloqueado';
        } elseif ($this->identificacaoEncomenda !== null) {
            $situacao = 'Ocupado';
        } else {
            $situacao = 'Livre';
        }

        return "Compartimento " . $this->numero . " | Situação: " . $situacao . " | Tentativas incorretas: " . $this->tentativasIncorretas;
    }
}

?>