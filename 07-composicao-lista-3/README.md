# Lista 3 de Composição: Abstração, Encapsulamento e Composição

Nome completo: Samuel Rodrigues
RA: 2211715
Turma: C - BCC
Disciplina: Programação Orientada a Objetos

Atividade individual com 10 exercícios, da Unidade 4 da disciplina. Cada exercício foi modelado a partir do cenário descrito no enunciado, sem roteiro de implementação a partir do exercício 2, usando classes com construtor, encapsulamento e composição ou relacionamento entre objetos. Não foi utilizada herança, interface, classe abstrata ou framework.

## Exercícios

| Pasta | Classes | Descrição |
|---|---|---|
| [ex01](./ex01) | `Pergunta`, `Questionario` | Questionário que reúne perguntas, mantendo a ordem de cadastro e o total de perguntas |
| [ex02](./ex02) | `Jogador`, `Time` | Escalação de um time, impedindo dois jogadores com o mesmo número de camisa |
| [ex03](./ex03) | `Produto`, `Carrinho` | Carrinho de compras, com valor total, remoção de itens e bloqueio de produto duplicado |
| [ex04](./ex04) | `Livro`, `Biblioteca` | Catálogo de livros, com empréstimo, devolução e ISBN único |
| [ex05](./ex05) | `Missao`, `RegistroMissoes` | Missões de RPG, com total de moedas das concluídas e listagem das pendentes |
| [ex06](./ex06) | `Estudante`, `Turma` | Turma com capacidade máxima, RA único, média geral e total de aprovados |
| [ex07](./ex07) | `Veiculo`, `Estacionamento` | Controle de vagas, com bloqueio de placa repetida e de lotação |
| [ex08](./ex08) | `Ingresso`, `Sessao` | Venda de ingressos de cinema, com poltronas disponíveis e arrecadação total |
| [ex09](./ex09) | `Equipamento`, `Mochila`, `Aventureiro` | Coleta e descarte de equipamentos, respeitando o peso máximo da mochila |
| [ex10](./ex10) | `Atividade`, `AcompanhamentoDisciplina`, `Estudante` | Desempenho acadêmico calculado a partir das atividades avaliadas de um estudante |

## Requisitos

- PHP 8.4 ou superior
- [Composer](https://getcomposer.org/)

## Como executar os testes

Cada exercício é um projeto PHP independente, com seu próprio `composer.json` e sua própria pasta `src/`. Os comandos devem ser executados a partir da pasta do exercício:

```bash
cd ex01
composer install
php index.php
```

O comando `composer install` gera o diretório `vendor/` com o autoloader (mapeamento PSR-4 do namespace `App\` para `src/`). O diretório não é versionado. Repita o processo em cada uma das 10 pastas para rodar todos os exercícios.

## Observações sobre o desenvolvimento

- Todos os exercícios foram testados e executados antes da entrega, incluindo os testes de situações inválidas pedidos no enunciado (dados duplicados, limites excedidos, valores negativos e operações sobre itens inexistentes).
- Os métodos que retornam uma lista (como `listarPerguntas()`, `catalogo()` ou `listarEquipamentos()`) sempre terminam com uma quebra de linha, mesmo quando a coleção está vazia, para que o texto não se misture com o que vem depois ao ser concatenado.
- Nos exercícios 3 e 9, a validação de valores negativos (preço do produto e peso/valor do equipamento) é feita no construtor, lançando `InvalidArgumentException`.
