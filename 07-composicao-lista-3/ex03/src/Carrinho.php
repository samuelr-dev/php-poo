<?php

namespace App;

class Carrinho {

    private array $itens;

    public function __construct() {
        $this->itens = [];
    }

    public function adicionarProduto(Produto $produto): bool {
        foreach ($this->itens as $item) {
            if ($item->codigo == $produto->codigo) {
                return false;
            }
        }

        $this->itens[] = $produto;
        return true;
    }

    public function removerProduto(string $codigo): bool {
        $novaLista = [];
        $removido = false;

        foreach ($this->itens as $item) {
            if ($item->codigo == $codigo && !$removido) {
                $removido = true;
            } else {
                $novaLista[] = $item;
            }
        }

        $this->itens = $novaLista;
        return $removido;
    }

    public function totalItens(): int {
        return count($this->itens);
    }

    public function valorTotal(): float {
        $total = 0;

        foreach ($this->itens as $item) {
            $total += $item->getPreco();
        }

        return $total;
    }

    public function listarItens(): string {
        if ($this->totalItens() == 0) {
            return "Carrinho vazio.\n";
        }

        $lista = "";

        foreach ($this->itens as $item) {
            $lista .= $item->codigo . " - " . $item->nome . " - R$" . $item->getPreco() . "\n";
        }

        return $lista;
    }
}

?>
