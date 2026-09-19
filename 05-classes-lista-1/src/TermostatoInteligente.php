<?php

namespace App;

use InvalidArgumentException;

class TermostatoInteligente
{
    private float $temperaturaAtual, $temperaturaAlvo;
    private bool $ligado = false;

    public function __construct(float $temperaturaAtual, float $temperaturaAlvo) {
        $this->validarTemperatura($temperaturaAlvo);

        $this->temperaturaAtual = $temperaturaAtual;
        $this->temperaturaAlvo = $temperaturaAlvo;

    }

    private function validarTemperatura(float $temperaturaAlvo): void {
        if($temperaturaAlvo < 16.0 || $temperaturaAlvo > 30.0) {
            throw new InvalidArgumentException("A temperatura alvo deve ser entre 16°C e 30°C");
        }
    }

    public function ligar(): void {
        $this->ligado = true;
    }

    public function desligar(): void {
        $this->ligado = false;
    }

    public function definirTemperaturaAlvo(float $temperatura): void {
        if($this->ligado === false) {
            throw new InvalidArgumentException("Não é possível definir a temperatura pois o termostato está desligado, ligue-o primeiro");
        }

        if($temperatura< 16.0 || $temperatura > 30.0) {
            throw new InvalidArgumentException("A temperatura alvo deve ser entre 16°C e 30°C");
        }

        $this->temperaturaAlvo = $temperatura;
    }

    public function atualizarTemperaturaAtual(float $temperatura): void {
        if($this->ligado === false) {
            throw new InvalidArgumentException("Não é possível atualizar a temperatura pois o termostato está desligado, ligue-o primeiro");
        }

        $this->temperaturaAtual = $temperatura;
        
    }

    public function acaoNecessaria(): string {
        if ($this->ligado === false) {
            return "desligado";
        }
        if ($this->temperaturaAtual < $this->temperaturaAlvo) {
            return "aquecer";
        } elseif ($this->temperaturaAtual > $this->temperaturaAlvo) {
            return "resfriar";
        } else {
            return "manter";
        }
    }

}

?>