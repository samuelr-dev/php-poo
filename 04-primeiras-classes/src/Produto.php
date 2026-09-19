<?php

namespace App;

class Produto 
{

    public function __construct(
        public string $nome,
        public string $categoria,
        public string $marca, 
        public float $preco
    ) {}

    public function apresentarProduto(): string {
        return "Olá! Produto: {$this->nome}, pertence a categoria: {$this->categoria}, marca do produto: {$this->marca} e o seu preço é: R$ {$this->preco}!";
    }

}

?>