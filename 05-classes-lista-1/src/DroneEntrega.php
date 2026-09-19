<?php

namespace App;

use InvalidArgumentException;

class DroneEntrega
{
    private string $identificador;
    private int $bateria;
    private float $cargaAtualKg, $cargaMaximaKg;
    private string $status;

    public function __construct(string $identificador, float $cargaMaximaKg) {
        $this->verificarDados($identificador, $cargaMaximaKg);

        $this->identificador = trim($identificador);
        $this->cargaMaximaKg = $cargaMaximaKg;
        $this->bateria = 100;
        $this->cargaAtualKg = 0;
        $this->status = "disponivel";
    }

    private function verificarDados(string $identificador, float $cargaMaximaKg): void {
        if (trim($identificador) === '') {
            throw new InvalidArgumentException("O identificador não pode estar vazio");
        }

        if ($cargaMaximaKg <= 0) {
            throw new InvalidArgumentException("A carga máxima deve ser positiva");
        }
    }

    public function carregarPacote(float $peso): void {
        if ($peso <= 0) {
            throw new InvalidArgumentException("O peso do pacote deve ser positivo");
        }

        if ($peso > $this->cargaMaximaKg) {
            throw new InvalidArgumentException("O peso do pacote ultrapassa a capacidade máxima");
        }

        if ($this->status !== "disponivel") {
            throw new InvalidArgumentException("O drone precisa estar disponível para ser carregado");
        }

        $this->cargaAtualKg = $peso;
    }

    private function consumoEstimado(float $distanciaKm): int {
        return (int) ceil($distanciaKm * 10);
    }

    public function decolar(float $distanciaKm): void {
        if ($distanciaKm <= 0) {
            throw new InvalidArgumentException("A distância deve ser positiva");
        }

        if ($this->cargaAtualKg <= 0) {
            throw new InvalidArgumentException("O drone precisa estar com um pacote carregado");
        }

        $consumo = $this->consumoEstimado($distanciaKm);

        if ($consumo > $this->bateria) {
            throw new InvalidArgumentException("Bateria insuficiente para realizar a entrega");
        }

        $this->bateria -= $consumo;
        $this->status = "em_voo";
    }

    public function finalizarEntrega(): void {
        if ($this->status !== "em_voo") {
            throw new InvalidArgumentException("O drone precisa estar em voo para finalizar a entrega");
        }

        $this->cargaAtualKg = 0;
        $this->status = "disponivel";
    }

    public function recarregar(): void {
        if ($this->status === "em_voo") {
            throw new InvalidArgumentException("Não é possível recarregar o drone durante o voo");
        }

        $this->bateria = 100;
    }

    public function status(): string {
        return "-------" . PHP_EOL
            . "Drone: {$this->identificador}" . PHP_EOL
            . "Bateria: {$this->bateria}%" . PHP_EOL
            . "Carga: {$this->cargaAtualKg} kg" . PHP_EOL
            . "Carga máxima: {$this->cargaMaximaKg} kg" . PHP_EOL
            . "Status: {$this->status}" . PHP_EOL;
    }
}

?>