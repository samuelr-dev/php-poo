<?php

namespace App;
use InvalidArgumentException;

class IngressoCinema
{   


    public function __construct(public string $filme, private float $precoBase, private bool $meiaEntrada){
        $this->verificarPreco($precoBase);
    }

    private function verificarPreco(float $precoBase): void {
        if ($precoBase <= 0) {
            throw new InvalidArgumentException("O preço tem de ser maior que 0");
        } 
    }

    public function calcularValorFinal(): float {
        return $this->meiaEntrada ? $this->precoBase * 0.5 : $this->precoBase;
    }

    public function definirMeiaEntrada(bool $possuiDireito): void {
        $this->meiaEntrada = $possuiDireito;
    }

     public function resumo(): string {
        $tipoIngresso = $this->meiaEntrada ? "Meia-entrada" : "Inteira";
        $valorFinal = number_format($this->calcularValorFinal(), 2, ',', '.');

        return "Filme: {$this->filme}" . PHP_EOL
             . "Tipo: {$tipoIngresso}" . PHP_EOL
             . "Valor Final: R$ {$valorFinal}" . PHP_EOL;
    }
}   

?>