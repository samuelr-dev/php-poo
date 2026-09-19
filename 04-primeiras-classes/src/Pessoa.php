<?php

namespace App;

class Pessoa 
{

    public function __construct(
        public string $nome,
        public int $idade
    ) {}

    public function apresentarPessoa(): string 
    {
        return "Olá! Me chamo {$this->nome} e tenho {$this->idade} anos!";
    }

}

?>