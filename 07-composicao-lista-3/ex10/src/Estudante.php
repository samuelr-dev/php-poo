<?php

namespace App;

class Estudante {

    public function __construct(
        public string $nome,
        public string $ra,
        public AcompanhamentoDisciplina $acompanhamento
    ) {}

    public function consultarDesempenho(): float {
        return $this->acompanhamento->desempenho();
    }
}

?>
