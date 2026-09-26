<?php

namespace App;

class CronometroTreino {

    public string $atividade;
    private int $segundosAcumulados;

    public function __construct(string $atividade) {
        $this->atividade = $atividade;
        $this->segundosAcumulados = 0;
    }

    public function adicionarTempo(int $segundos): bool {
        if ($segundos <= 0) {
            return false;
        }

        $this->segundosAcumulados += $segundos;
        return true;
    }

    public function zerar(): void {
        $this->segundosAcumulados = 0;
    }

    public function totalMinutos(): float {
        return $this->segundosAcumulados / 60;
    }

    public function formatarTempo(): string {
        $horas = (int) ($this->segundosAcumulados / 3600);
        $minutos = (int) (($this->segundosAcumulados % 3600) / 60);
        $segundos = $this->segundosAcumulados % 60;

        if ($horas < 10) {
            $horas = '0' . $horas;
        }

        if ($minutos < 10) {
            $minutos = '0' . $minutos;
        }

        if ($segundos < 10) {
            $segundos = '0' . $segundos;
        }

        return $horas . ':' . $minutos . ':' . $segundos;
    }
}