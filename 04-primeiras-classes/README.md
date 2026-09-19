# 04 - Primeiras Classes em PHP

Primeiro contato com classes em PHP: criação de classes simples, instanciação de objetos e organização do código com namespaces e autoload do Composer.

## Tópicos abordados

- Declaração de classes, propriedades e métodos
- Construtor com promoção de propriedades (PHP 8)
- Tipagem de propriedades e de retorno de métodos
- Namespaces e autoload PSR-4 com Composer

## Classes

| Classe | Propriedades | Método |
|---|---|---|
| `Pessoa` | nome, idade | `apresentarPessoa()` |
| `Aluno` | nome, RA, curso, semestre | `apresentarAluno()` |
| `Produto` | nome, categoria, marca, preço | `apresentarProduto()` |

O `index.php` instancia um objeto de cada classe e exibe a apresentação correspondente.

## Estrutura

```
04-primeiras-classes/
├── composer.json
├── composer.lock
├── index.php
└── src/
    ├── Aluno.php
    ├── Pessoa.php
    └── Produto.php
```

## Como executar

```bash
composer install
php index.php
```

O comando `composer install` gera o diretório `vendor/` com o autoloader (mapeamento PSR-4 do namespace `App\` para `src/`). O diretório não é versionado.
