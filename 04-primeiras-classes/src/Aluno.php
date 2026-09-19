<?php

namespace App;

class Aluno 
{

    public function __construct(
        public string $nome,
        public int $RA,
        public string $curso, 
        public string $semestre
    ) {}

    public function apresentarAluno(): string {
        return "Olá! Aluno: {$this->nome}, RA: {$this->RA}, cursando: {$this->curso} e está no {$this->semestre} semestre!";
    }

}

?>