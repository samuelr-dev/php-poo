<?php

namespace App;
use InvalidArgumentException;

class Aluno 
{
    private string $nomeAluno, $raAluno;
    private array $listaNotas = [];

    public function __construct(string $nomeAluno, string $raAluno) {
        $this->verificarDados($nomeAluno, $raAluno);

        $this->nomeAluno = trim($nomeAluno);
        $this->raAluno = trim($raAluno);
    }

    private function verificarDados(string $nomeAluno, string $raAluno): void {
        if (trim($nomeAluno) === '') {
            throw new InvalidArgumentException("O campo Nome não pode estar vazio");
        }
        if (trim($raAluno) === '') {
            throw new InvalidArgumentException("O campo RA não pode estar vazio");
        }
    }
 
    public function adicionarNota(float $nota): void {
        
        if ($nota < 0 || $nota > 10) {
            throw new InvalidArgumentException("A nota tem de ser entre 0 e 10");
        } 
        
        $this->listaNotas[] = $nota;

    }

    public function calcularMedia(): float {

        if (count($this->listaNotas) === 0) {
            throw new InvalidArgumentException("Não é possível calcular a média sem notas");
        }

        $somaNotas = 0;
            
        foreach($this->listaNotas as $nota) {
            $somaNotas += $nota;
        }
    
        return $somaNotas / count($this->listaNotas);
    }

    public function situacao(): string {

        $media = $this->calcularMedia();

        if ($media >= 7) {
            return "Aprovado";
        } elseif ($media >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    public function resumo(): string {
        return "Aluno: {$this->nomeAluno}" . PHP_EOL
        . "RA: {$this->raAluno}" . PHP_EOL
        . "Média: " . number_format($this->calcularMedia(), 2, ',', '.') . PHP_EOL
        . "Situação: {$this->situacao()}" . PHP_EOL;
    }


}

?>