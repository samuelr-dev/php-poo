<?php

namespace App;

use InvalidArgumentException;

class Produto {

    public function __construct(
        public string $nome,
        private float $preco,
        public string $codigo
    ) {
        if ($preco < 0) {
            throw new InvalidArgumentException('O preço não pode ser negativo.');
        }
    }

    public function getPreco(): float {
        return $this->preco;
    }
}

?>
