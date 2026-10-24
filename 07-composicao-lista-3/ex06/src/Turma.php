<?php

namespace App;

class Turma {

    private array $estudantes;

    public function __construct(
        public string $identificacao,
        private int $capacidadeMaxima
    ) {
        $this->estudantes = [];
    }

    public function matricular(Estudante $estudante): bool {
        if (count($this->estudantes) >= $this->capacidadeMaxima) {
            return false;
        }

        foreach ($this->estudantes as $matriculado) {
            if ($matriculado->ra == $estudante->ra) {
                return false;
            }
        }

        $this->estudantes[] = $estudante;
        return true;
    }

    public function relacaoEstudantes(): string {
        if (count($this->estudantes) == 0) {
            return "Nenhum estudante matriculado.\n";
        }

        $lista = "";

        foreach ($this->estudantes as $estudante) {
            $lista .= $estudante->nome . " (RA " . $estudante->ra . ") - Nota: " . $estudante->getNotaFinal() . "\n";
        }

        return $lista;
    }

    public function mediaGeral(): float {
        if (count($this->estudantes) == 0) {
            return 0;
        }

        $soma = 0;

        foreach ($this->estudantes as $estudante) {
            $soma += $estudante->getNotaFinal();
        }

        return $soma / count($this->estudantes);
    }

    public function totalMatriculados(): int {
        return count($this->estudantes);
    }

    public function totalAprovados(): int {
        $total = 0;

        foreach ($this->estudantes as $estudante) {
            if ($estudante->foiAprovado()) {
                $total++;
            }
        }

        return $total;
    }
}

?>
