<?php

namespace App;

class RoboArena {

    private int $energia;
    private int $integridadeEstrutural;
    private int $pontuacao;

    public function __construct(
        public string $nome
    ) {
        $this->energia = 100;
        $this->integridadeEstrutural = 100;
        $this->pontuacao = 0;
    }

    public function treinar(): bool {
        $custoEnergia = 15;

        if ($this->energia < $custoEnergia) {
            return false;
        }

        $this->energia -= $custoEnergia;
        $this->pontuacao += 10;
        return true;
    }

    public function participarCombate(): bool {
        if ($this->energia <= 0 || $this->integridadeEstrutural <= 0) {
            return false;
        }

        $desgasteEnergia = 25;
        $desgasteIntegridade = 20;

        $this->energia -= $desgasteEnergia;
        if ($this->energia < 0) {
            $this->energia = 0;
        }

        $this->integridadeEstrutural -= $desgasteIntegridade;
        if ($this->integridadeEstrutural < 0) {
            $this->integridadeEstrutural = 0;
        }

        return true;
    }

    public function recarregar(int $quantidade): int {
        if ($quantidade <= 0) {
            return 0;
        }

        $adicionado = $quantidade;

        if ($this->energia + $adicionado > 100) {
            $adicionado = 100 - $this->energia;
        }

        $this->energia += $adicionado;
        return $adicionado;
    }

    public function repararIntegridade(int $quantidade): int {
        if ($quantidade <= 0) {
            return 0;
        }

        $adicionado = $quantidade;

        if ($this->integridadeEstrutural + $adicionado > 100) {
            $adicionado = 100 - $this->integridadeEstrutural;
        }

        $this->integridadeEstrutural += $adicionado;
        return $adicionado;
    }

    public function status(): string {
        return "Robô: " . $this->nome . " | Energia: " . $this->energia . " | Integridade: " . $this->integridadeEstrutural . " | Pontuação: " . $this->pontuacao;
    }
}

?>