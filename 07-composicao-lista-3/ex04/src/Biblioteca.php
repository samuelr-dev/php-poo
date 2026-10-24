<?php

namespace App;

class Biblioteca {

    private array $livros;

    public function __construct() {
        $this->livros = [];
    }

    public function cadastrarLivro(Livro $livro): bool {
        if ($this->buscarPorIsbn($livro->isbn) !== null) {
            return false;
        }

        $this->livros[] = $livro;
        return true;
    }

    public function buscarPorIsbn(string $isbn): ?Livro {
        foreach ($this->livros as $livro) {
            if ($livro->isbn == $isbn) {
                return $livro;
            }
        }

        return null;
    }

    public function emprestarLivro(string $isbn): bool {
        $livro = $this->buscarPorIsbn($isbn);

        if ($livro === null) {
            return false;
        }

        return $livro->emprestar();
    }

    public function devolverLivro(string $isbn): bool {
        $livro = $this->buscarPorIsbn($isbn);

        if ($livro === null) {
            return false;
        }

        return $livro->devolver();
    }

    public function catalogo(): string {
        if (count($this->livros) == 0) {
            return "Nenhum livro cadastrado.\n";
        }

        $lista = "";

        foreach ($this->livros as $livro) {
            $status = $livro->estaDisponivel() ? "Disponível" : "Emprestado";
            $lista .= $livro->titulo . " - " . $livro->autor . " - " . $status . "\n";
        }

        return $lista;
    }
}

?>
