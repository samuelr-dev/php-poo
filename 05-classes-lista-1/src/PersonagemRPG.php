<?php

namespace App;

use InvalidArgumentException;

class PersonagemRPG
{
    private string $nomePersonagem;
    private int $vidaAtual, $vidaMaxima, $energiaPersonagem;

    public function __construct(string $nomePersonagem, int $vidaMaxima) {
        $this->verificarDados($nomePersonagem, $vidaMaxima);

        $this->nomePersonagem = trim($nomePersonagem);
        $this->vidaMaxima = $vidaMaxima;
        $this->vidaAtual = $vidaMaxima;
        $this->energiaPersonagem = 100;
    }

    private function verificarDados(string $nomePersonagem, int $vidaMaxima): void {
        if (trim($nomePersonagem) === '') {
            throw new InvalidArgumentException("O campo nome do personagem não pode estar vazio");
        }
        if ($vidaMaxima <= 0) {
            throw new InvalidArgumentException("A vida máxima tem que ser positiva");
        }
    }

    public function sofrerDano(int $dano): void {
        if ($dano <= 0) {
            throw new InvalidArgumentException("O dano não pode ser negativo");
        }

        if ($dano >= $this->vidaAtual) {
            $this->vidaAtual = 0;
        } else {
            $this->vidaAtual -= $dano;
        }
    }

    public function curar(int $pontosVida): void {
        if ($pontosVida <= 0) {
            throw new InvalidArgumentException("Os pontos de vida tem de ser positivos");
        }

        if ($this->vidaAtual + $pontosVida >= $this->vidaMaxima) {
            $this->vidaAtual = $this->vidaMaxima;
        } else {
            $this->vidaAtual += $pontosVida;
        }
    }

    public function executarAtaque(int $custoEnergia, int $danoBase): int {
        if ($custoEnergia <= 0) {
            throw new InvalidArgumentException("O custo de energia deve ser positivo");
        }

        if ($danoBase <= 0) {
            throw new InvalidArgumentException("O dano base deve ser positivo");
        }

        if (!$this->estaVivo()) {
            throw new InvalidArgumentException("O personagem está derrotado"
            );
        }

        if ($this->energiaPersonagem < $custoEnergia) {
            throw new InvalidArgumentException("Energia insuficiente para realizar o ataque");
        }

        $this->energiaPersonagem -= $custoEnergia;
        return $danoBase;
    }

    public function descansar(): void {
        $this->energiaPersonagem = 100;
    }

    public function estaVivo(): bool {
        return $this->vidaAtual > 0;
    }

    public function status(): string {
        if ($this->estaVivo()) {
            return "Vivo";
        }

        return "Derrotado";
    }
}

?>