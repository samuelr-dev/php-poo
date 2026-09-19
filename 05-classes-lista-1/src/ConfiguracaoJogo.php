<?php

namespace App;

use InvalidArgumentException;

class ConfiguracaoJogo
{
    private int $volume;
    private string $dificuldade;
    private bool $telaCheia;

    public function __construct(int $volume, string $dificuldade) {
        $this->verificarDados($volume, $dificuldade);

        $this->volume = $volume;
        $this->dificuldade = $dificuldade;
        $this->telaCheia = false;
    }

    private function verificarDados(int $volume, string $dificuldade): void {
        if ($volume < 0 || $volume > 100) {
            throw new InvalidArgumentException("O volume deve estar entre 0 e 100");
        }

        if ($dificuldade !== "facil" && $dificuldade !== "normal" && $dificuldade !== "dificil") {
            throw new InvalidArgumentException("A dificuldade deve ser facil, normal ou dificil");
        }
    }

    public function alterarVolume(int $volume): void {
        if ($volume < 0 || $volume > 100) {
            throw new InvalidArgumentException("O volume deve estar entre 0 e 100");
        }

        $this->volume = $volume;
    }

    public function alterarDificuldade(string $dificuldade): void {
        if ($dificuldade !== "facil" && $dificuldade !== "normal" && $dificuldade !== "dificil") {
            throw new InvalidArgumentException("A dificuldade deve ser facil, normal ou dificil");
        }

        $this->dificuldade = $dificuldade;
    }

    public function alternarTelaCheia(): void {
        $this->telaCheia = !$this->telaCheia;
    }

    public function resumo(): string {
        return "-------" . PHP_EOL
            . "Volume: {$this->volume}" . PHP_EOL
            . "Dificuldade: {$this->dificuldade}" . PHP_EOL
            . "Tela cheia: " . ($this->telaCheia ? "Sim" : "Não") . PHP_EOL;
    }
}

?>