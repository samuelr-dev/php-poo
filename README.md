# PHP - Programação Orientada a Objetos

Exercícios e Projetos desenvolvidos na disciplina de Programação Orientada a Objetos (POO) do curso de Bacharelado em Ciência da Computação. O repositório reúne tudo que foi realizado durante o percurso da disciplina.

## Conteúdo

| Pasta | Tema | Execução |
|---|---|---|
| [01-introducao-e-revisao](./01-introducao-e-revisao) | Entrada e saída, operadores, condicionais, laços, arrays e funções básicas | Interativa |
| [02-revisao-funcoes](./02-revisao-funcoes) | Funções com tipagem, retorno, parâmetros padrão e composição | Interativa |
| [03-desafios-de-logica](./03-desafios-de-logica) | Lógica com matrizes e arrays: busca, contagem e validação | Não interativa |
| [04-primeiras-classes](./04-primeiras-classes) | Primeiras classes, construtores, namespaces e autoload PSR-4 | Não interativa |
| [05-classes-lista-1](./05-classes-lista-1) | Lista com 10 exercícios de classes: encapsulamento, validação e exceções | Não interativa |
| [06-classes-lista-2](./06-classes-lista-2) | Lista com 20 exercícios de classes: regras de negócio, controle de estado e modelagem livre | Não interativa |

## Requisitos

- PHP 8.4 ou superior (versão definida nos arquivos `composer.json`)
- [Composer](https://getcomposer.org/), necessário nas pastas 04, 05 e 06

## Como executar

Os comandos devem ser executados a partir da pasta do exercício.

Pastas 01, 02 e 03 (sem dependências):

```bash
cd 01-introducao-e-revisao
php index.php
```

Pastas 04 e 05 (utilizam o autoload do Composer, um único `index.php` por pasta):

```bash
cd 05-classes-lista-1
composer install
php index.php
```

Pasta 06 (utiliza o autoload do Composer, um arquivo de teste por exercício):

```bash
cd 06-classes-lista-2
composer install
php ex1-retangulo.php
```

O diretório `vendor/` não é versionado. O comando `composer install` gera o autoloader a partir do `composer.json`.

## Estrutura

Cada pasta contém um `README.md` com a descrição dos exercícios. As pastas 01 a 03 têm um único arquivo `index.php`. As pastas 04 e 05 possuem ainda `composer.json`, `composer.lock` e o diretório `src/`, com uma classe por arquivo, e um único `index.php` de teste. A pasta 06 segue a mesma estrutura de `composer.json`, `composer.lock` e `src/`, mas com um arquivo de teste por exercício (`ex1-retangulo.php` a `ex20-astronauta.php`), em vez de um único `index.php`.

## Observações sobre o desenvolvimento

- Os exercícios foram desenvolvidos localmente ao longo do semestre, sem controle de versão. O repositório foi criado depois, para organizar e publicar o material. Por isso, o histórico de commits reflete a organização do conteúdo, e não a ordem em que os exercícios foram escritos.
- Por solicitação do professor, o código executável de cada atividade das pastas 01 a 05 fica em um único arquivo `index.php`. Nas pastas 04 e 05, as classes ficam em arquivos próprios dentro de `src/`, e o `index.php` funciona como script de demonstração e testes. Na pasta 06, cada exercício tem seu próprio arquivo de teste, conforme pedido na atividade.
- O código é o mesmo que foi desenvolvido para a disciplina. Foram alterados apenas os nomes e a organização das pastas.

## Autor

Samuel Rodrigues