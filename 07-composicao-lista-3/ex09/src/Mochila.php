<?php

namespace App;

class Mochila {

    private array $equipamentos;

    public function __construct(
        private float $capacidadeMaxima
    ) {
        $this->equipamentos = [];
    }

    public function pesoOcupado(): float {
        $total = 0;

        foreach ($this->equipamentos as $equipamento) {
            $total += $equipamento->peso;
        }

        return $total;
    }

    public function espacoRestante(): float {
        return $this->capacidadeMaxima - $this->pesoOcupado();
    }

    public function coletar(Equipamento $equipamento): bool {
        if ($equipamento->peso > $this->espacoRestante()) {
            return false;
        }

        $this->equipamentos[] = $equipamento;
        return true;
    }

    public function descartar(string $nome): bool {
        $novaLista = [];
        $removido = false;

        foreach ($this->equipamentos as $equipamento) {
            if ($equipamento->nome == $nome && !$removido) {
                $removido = true;
            } else {
                $novaLista[] = $equipamento;
            }
        }

        $this->equipamentos = $novaLista;
        return $removido;
    }

    public function valorTotal(): float {
        $total = 0;

        foreach ($this->equipamentos as $equipamento) {
            $total += $equipamento->valor;
        }

        return $total;
    }

    public function listarEquipamentos(): string {
        if (count($this->equipamentos) == 0) {
            return "Mochila vazia.\n";
        }

        $lista = "";

        foreach ($this->equipamentos as $equipamento) {
            $lista .= $equipamento->nome . " - Peso: " . $equipamento->peso . " - Valor: " . $equipamento->valor . "\n";
        }

        return $lista;
    }
}

?>
