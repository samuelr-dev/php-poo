<?php

namespace App;

use InvalidArgumentException;

class PetVirtual
{
    private string $nomePet;
    private int $fome, $energia, $felicidade;

    public function __construct(string $nomePet) {
        $this->verificarDados($nomePet);

        $this->nomePet = trim($nomePet);
        $this->fome = 50;
        $this->energia = 50;
        $this->felicidade = 50;
    }

    private function verificarDados(string $nomePet): void {
        if (trim($nomePet) === '') {
            throw new InvalidArgumentException("O campo nome do pet não pode estar vazio");
        }
    }

    private function limitar(int $valor): int {
        if ($valor < 0) {
            return 0;
        }

        if ($valor > 100) {
            return 100;
        }

        return $valor;
    }

    public function alimentar(): void {
        $this->fome = $this->limitar($this->fome - 20);
        $this->felicidade = $this->limitar($this->felicidade + 10);
        $this->energia = $this->limitar($this->energia + 5);
    }

    public function brincar(): void {
        $this->fome = $this->limitar($this->fome + 10);
        $this->felicidade = $this->limitar($this->felicidade + 20);
        $this->energia = $this->limitar($this->energia - 20);
    }

    public function dormir(): void {
        $this->energia = $this->limitar($this->energia + 30);
        $this->fome = $this->limitar($this->fome + 10);
        $this->felicidade = $this->limitar($this->felicidade + 5);
    }

    public function status(): string {
        return "PET: {$this->nomePet}" . PHP_EOL
            . "Fome: {$this->fome}/100" . PHP_EOL
            . "Energia: {$this->energia}/100" . PHP_EOL
            . "Felicidade: {$this->felicidade}/100" . PHP_EOL;
    }
}

?>