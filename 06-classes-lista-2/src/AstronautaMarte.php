<?php

namespace App;

class AstronautaMarte {

    private int $vida;
    private int $energia;
    private int $oxigenio;
    private int $cargasCilindro;

    public function __construct(
        public string $nome,
        int $cargasCilindro
    ) {
        $this->vida = 100;
        $this->energia = 100;
        $this->oxigenio = 100;
        $this->cargasCilindro = $cargasCilindro > 0 ? $cargasCilindro : 0;
    }

    public function explorar(int $custoEnergia, int $custoOxigenio): bool {
        if ($this->vida <= 0 || $this->oxigenio <= 0) {
            return false;
        }

        if ($custoEnergia <= 0 || $custoOxigenio <= 0) {
            return false;
        }

        if ($custoEnergia > $this->energia || $custoOxigenio > $this->oxigenio) {
            return false;
        }

        $this->energia -= $custoEnergia;
        $this->oxigenio -= $custoOxigenio;
        return true;
    }

    public function descansar(int $quantidade): bool {
        if ($this->vida <= 0 || $quantidade <= 0) {
            return false;
        }

        $this->energia += $quantidade;

        if ($this->energia > 100) {
            $this->energia = 100;
        }

        return true;
    }

    public function utilizarCilindro(int $quantidade): bool {
        if ($this->vida <= 0 || $quantidade <= 0) {
            return false;
        }

        if ($this->cargasCilindro <= 0) {
            return false;
        }

        $this->oxigenio += $quantidade;

        if ($this->oxigenio > 100) {
            $this->oxigenio = 100;
        }

        $this->cargasCilindro -= 1;
        return true;
    }

    public function sofrerIncidente(int $quantidade): bool {
        if ($quantidade <= 0) {
            return false;
        }

        $this->vida -= $quantidade;

        if ($this->vida < 0) {
            $this->vida = 0;
        }

        return true;
    }

    public function tratarFerimentos(int $quantidade): bool {
        if ($quantidade <= 0) {
            return false;
        }

        $this->vida += $quantidade;

        if ($this->vida > 100) {
            $this->vida = 100;
        }

        return true;
    }

    public function resumo(): string {
        return "Astronauta: " . $this->nome . " | Vida: " . $this->vida . " | Energia: " . $this->energia . " | Oxigênio: " . $this->oxigenio . " | Cargas de cilindro: " . $this->cargasCilindro;
    }
}

?>