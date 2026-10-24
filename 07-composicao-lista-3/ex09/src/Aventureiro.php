<?php

namespace App;

class Aventureiro {

    public function __construct(
        public string $nome,
        private int $pontosDeVida,
        public Mochila $mochila
    ) {}

    public function coletarEquipamento(Equipamento $equipamento): bool {
        return $this->mochila->coletar($equipamento);
    }

    public function descartarEquipamento(string $nome): bool {
        return $this->mochila->descartar($nome);
    }

    public function getPontosDeVida(): int {
        return $this->pontosDeVida;
    }
}

?>
