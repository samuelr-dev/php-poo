<?php

namespace App;

class Jogador {

    public function __construct(
        public string $nome,
        public int $numeroCamisa,
        public string $posicao
    ) {}
}

?>
