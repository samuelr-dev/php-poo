<?php

namespace App;

class Estacionamento {

    private array $veiculos;

    public function __construct(
        private int $capacidade
    ) {
        $this->veiculos = [];
    }

    public function registrarEntrada(Veiculo $veiculo): bool {
        if (count($this->veiculos) >= $this->capacidade) {
            return false;
        }

        if ($this->buscarPorPlaca($veiculo->placa) !== null) {
            return false;
        }

        $this->veiculos[] = $veiculo;
        return true;
    }

    public function registrarSaida(string $placa): bool {
        $novaLista = [];
        $removido = false;

        foreach ($this->veiculos as $veiculo) {
            if ($veiculo->placa == $placa && !$removido) {
                $removido = true;
            } else {
                $novaLista[] = $veiculo;
            }
        }

        $this->veiculos = $novaLista;
        return $removido;
    }

    public function buscarPorPlaca(string $placa): ?Veiculo {
        foreach ($this->veiculos as $veiculo) {
            if ($veiculo->placa == $placa) {
                return $veiculo;
            }
        }

        return null;
    }

    public function vagasLivres(): int {
        return $this->capacidade - count($this->veiculos);
    }
}

?>
