<?php

namespace App;
use InvalidArgumentException;

class ContaBancaria 
{
    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldo) {
        $this->verificarTitular($titular);
        $this->verificarSaldo($saldo);
        $this->titular = trim($titular);
        $this->saldo = $saldo;
    }

    private function verificarSaldo(float $saldo): void {
        if ($saldo < 0) {
            throw new InvalidArgumentException("O saldo inicial não pode ser negativo.");
        }
    }

    private function verificarTitular(string $titular): void {
        if (trim($titular) == '') {
            throw new InvalidArgumentException("O nome do titular não pode estar em branco.");
        }
    }

    public function depositar(float $valorDeposito): void {
        if ($valorDeposito <= 0) {
            throw new InvalidArgumentException("O valor de depósito tem de ser maior que 0");
        }
            
        $this->saldo += $valorDeposito;
    }

    public function sacar(float $valorSaque): void {
        if ($valorSaque <= 0 || $valorSaque > $this->saldo) {
            throw new InvalidArgumentException("O valor de saque não pode ser negativo ou maior que o saldo disponível.");
        }
            
        $this->saldo -= $valorSaque;
    }

    public function consultarSaldo(): float {
        return $this->saldo;
    }

    public function resumo(): string {

            return "--- ESTADO DA CONTA ---" . PHP_EOL
            . "TITULAR: {$this->titular}" . PHP_EOL
            . "SALDO: R$ " . number_format($this->saldo, 2, ',', '.') . PHP_EOL;
        }

}
?>