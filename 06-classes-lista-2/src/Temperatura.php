<?php

namespace App;

use InvalidArgumentException;

class Temperatura
{

    public function __construct(private float $celsius) {
        $this->verificarTemperatura($celsius);
    }

    private function verificarTemperatura(float $celsius): void {
        if($celsius < -273.15) {
            throw new InvalidArgumentException("A temperatura alvo deve ser entre 16°C e 30°C");
        }
    }

    public function alterar(float $novoValor): bool 
    {
        if ($novoValor < -273.15) {
            return false;
        }

        $this->celsius = $novoValor;
        return true;
    }

    public function emFarenheit(): float {
        return ($this->celsius * 9/5) + 32;
    }

    public function emKelvin(): float {
        return $this->celsius + 273.15;
    }

    public function descricao(): string {
        return "---TEMPERATURAS---" . PHP_EOL
        . "Celsius: $this->celsius °C" . PHP_EOL
        . "Fahrenheit: " . $this->emFarenheit() . " °F" . PHP_EOL
        . "Kelvin: " . $this->emKelvin() . " K" . PHP_EOL;
    }
}

?>