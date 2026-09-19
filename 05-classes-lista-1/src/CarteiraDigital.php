<?php

namespace App;

use InvalidArgumentException;

class CarteiraDigital
{
    private string $proprietario;
    private float $saldo, $limiteDiario, $gastoHoje;

    public function __construct(string $proprietario,float $saldoInicial,float $limiteDiario) {
        $this->verificarDados($proprietario, $saldoInicial, $limiteDiario);

        $this->proprietario = trim($proprietario);
        $this->saldo = $saldoInicial;
        $this->limiteDiario = $limiteDiario;
        $this->gastoHoje = 0;
    }

    private function verificarDados(string $proprietario,float $saldoInicial,float $limiteDiario): void {
        if (trim($proprietario) === '') {
            throw new InvalidArgumentException("O campo proprietário não pode estar vazio");
        }

        if ($saldoInicial < 0) {
            throw new InvalidArgumentException("O saldo inicial não pode ser negativo");
        }

        if ($limiteDiario <= 0) {
            throw new InvalidArgumentException("O limite diário deve ser positivo");
        }
    }

    public function receber(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor recebido deve ser positivo");
        }

        $this->saldo += $valor;
    }

    private function validarPagamento(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do pagamento deve ser positivo");
        }

        if ($valor > $this->saldo) {
            throw new InvalidArgumentException("Saldo insuficiente para realizar o pagamento");
        }

        if ($valor > $this->consultarLimiteDisponivel()) {
            throw new InvalidArgumentException("O pagamento ultrapassa o limite diário disponível");
        }
    }

    public function pagarPix(float $valor): void {
        $this->validarPagamento($valor);

        $this->saldo -= $valor;
        $this->gastoHoje += $valor;
    }

    public function iniciarNovoDia(): void {
        $this->gastoHoje = 0;
    }

    public function consultarSaldo(): float {
        return $this->saldo;
    }

    public function consultarLimiteDisponivel(): float {
        return $this->limiteDiario - $this->gastoHoje;
    }

    public function resumo(): string {
        return "-------" . PHP_EOL
            . "Proprietário: {$this->proprietario}" . PHP_EOL
            . "Saldo: R$ " . number_format($this->saldo, 2, ',', '.') . PHP_EOL
            . "Limite diário disponível: R$ ". number_format($this->consultarLimiteDisponivel(), 2, ',', '.') . PHP_EOL;
    }
}

?>