<?php

namespace App;

class RegistroMissoes {

    private array $missoes;

    public function __construct() {
        $this->missoes = [];
    }

    public function adicionarMissao(Missao $missao): void {
        $this->missoes[] = $missao;
    }

    public function missoesPendentes(): string {
        $lista = "";

        foreach ($this->missoes as $missao) {
            if (!$missao->estaConcluida()) {
                $lista .= $missao->titulo . "\n";
            }
        }

        if ($lista == "") {
            return "Nenhuma missão pendente.\n";
        }

        return $lista;
    }

    public function totalMoedasConcluidas(): float {
        $total = 0;

        foreach ($this->missoes as $missao) {
            if ($missao->estaConcluida()) {
                $total += $missao->getRecompensa();
            }
        }

        return $total;
    }
}

?>
