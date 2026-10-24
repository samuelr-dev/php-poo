<?php

namespace App;

class Questionario {

    private array $perguntas;

    public function __construct(
        public string $titulo
    ) {
        $this->perguntas = [];
    }

    public function adicionarPergunta(Pergunta $pergunta): void {
        $this->perguntas[] = $pergunta;
    }

    public function totalPerguntas(): int {
        return count($this->perguntas);
    }

    public function listarPerguntas(): string {
        if ($this->totalPerguntas() == 0) {
            return "Nenhuma pergunta cadastrada.\n";
        }

        $lista = "";
        $numero = 1;

        foreach ($this->perguntas as $pergunta) {
            $lista .= $numero . ") " . $pergunta->getEnunciado() . "\n";
            $numero++;
        }

        return $lista;
    }
}

?>
