<?php

namespace App;

class AcompanhamentoDisciplina {

    private array $atividades;

    public function __construct(
        public string $nomeDisciplina,
        public int $cargaHoraria
    ) {
        $this->atividades = [];
    }

    public function adicionarAtividade(Atividade $atividade): bool {
        foreach ($this->atividades as $existente) {
            if ($existente->titulo == $atividade->titulo) {
                return false;
            }
        }

        $this->atividades[] = $atividade;
        return true;
    }

    public function desempenho(): float {
        $somaObtida = 0;
        $somaMaxima = 0;

        foreach ($this->atividades as $atividade) {
            $somaObtida += $atividade->getNota();
            $somaMaxima += $atividade->getValorMaximo();
        }

        if ($somaMaxima == 0) {
            return 0;
        }

        return $somaObtida / $somaMaxima;
    }

    public function atividadesNaoAvaliadas(): string {
        $lista = "";

        foreach ($this->atividades as $atividade) {
            if (!$atividade->foiAvaliada()) {
                $lista .= $atividade->titulo . "\n";
            }
        }

        if ($lista == "") {
            return "Todas as atividades já foram avaliadas.\n";
        }

        return $lista;
    }
}

?>
