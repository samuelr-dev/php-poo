<?php

namespace App;

class Pergunta {

    public function __construct(
        private string $enunciado,
        private string $respostaEsperada
    ) {}

    public function getEnunciado(): string {
        return $this->enunciado;
    }

    public function getRespostaEsperada(): string {
        return $this->respostaEsperada;
    }
}

?>
