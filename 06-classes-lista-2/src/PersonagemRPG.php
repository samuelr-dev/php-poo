<?php

namespace App;

class PersonagemRPG {

    private int $vida;
    private int $energia;

    public function __construct(
        public string $nome,
        public string $classe
    ) {
        $this->vida = 100;
        $this->energia = 100;
    }

    public function receberDano(int $pontos): bool {
        if ($pontos <= 0) {
            return false;
        }

        $this->vida -= $pontos;

        if ($this->vida < 0) {
            $this->vida = 0;
        }

        return true;
    }

    public function curar(int $pontos): bool {
        if ($pontos <= 0) {
            return false;
        }

        $this->vida += $pontos;

        if ($this->vida > 100) {
            $this->vida = 100;
        }

        return true;
    }

    public function usarHabilidade(int $custoEnergia): bool {
        if ($this->vida <= 0) {
            return false;
        }

        if ($custoEnergia <= 0 || $custoEnergia > $this->energia) {
            return false;
        }

        $this->energia -= $custoEnergia;
        return true;
    }

    public function descansar(int $pontos): bool {
        if ($pontos <= 0) {
            return false;
        }

        $this->energia += $pontos;

        if ($this->energia > 100) {
            $this->energia = 100;
        }

        return true;
    }

    public function status(): string {
        return "Nome: " . $this->nome . " | Classe: " . $this->classe . " | Vida: " . $this->vida . " | Energia: " . $this->energia;
    }
}

?>