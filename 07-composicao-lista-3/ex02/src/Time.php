<?php

namespace App;

class Time {

    private array $jogadores;

    public function __construct(
        public string $nome
    ) {
        $this->jogadores = [];
    }

    public function cadastrarJogador(Jogador $jogador): bool {
        if ($this->buscarPorNumero($jogador->numeroCamisa) !== null) {
            return false;
        }

        $this->jogadores[] = $jogador;
        return true;
    }

    public function buscarPorNumero(int $numeroCamisa): ?Jogador {
        foreach ($this->jogadores as $jogador) {
            if ($jogador->numeroCamisa == $numeroCamisa) {
                return $jogador;
            }
        }

        return null;
    }

    public function totalJogadores(): int {
        return count($this->jogadores);
    }

    public function escalacaoCompleta(): string {
        if ($this->totalJogadores() == 0) {
            return "Nenhum jogador cadastrado.\n";
        }

        $lista = "";

        foreach ($this->jogadores as $jogador) {
            $lista .= $jogador->nome . " - Camisa " . $jogador->numeroCamisa . " - " . $jogador->posicao . "\n";
        }

        return $lista;
    }
}

?>
