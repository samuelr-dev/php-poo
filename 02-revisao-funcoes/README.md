# 02 - Revisão de Funções

Exercícios de revisão sobre funções em PHP, com tipagem de parâmetros, retorno de valores e composição entre funções.

## Tópicos abordados

- Declaração de funções com parâmetros tipados (`string`, `float`, `int`, `array`, `bool`)
- Retorno de valores
- Parâmetros com valor padrão
- Funções que chamam outras funções
- Formatação de saída com `printf` e `number_format`
- Menu interativo com `switch`

## Exercícios

| Nº | Descrição |
|---|---|
| 1 | Função que saúda o usuário pelo nome |
| 2 | Função que retorna o dobro de um número |
| 3 | Função que soma dois números e exibe o resultado |
| 4 | Função com parâmetro de valor padrão |
| 5 | Funções compostas: cálculo e exibição do quadrado de um número |
| 6 | Função que conta os elementos de um array |
| 7 | Função que classifica a média final (aprovado, recuperação ou reprovado) |
| 8 | Criação de uma lista de números e separação em pares e ímpares |
| 9 | Cálculo da média de três notas e exibição da situação do aluno |
| 10 | Simulação de compra com menu interativo, cupom fiscal e desconto de 10% para cartão fidelidade |

### Exercício 10

O menu oferece quatro opções: encerrar o programa, exibir os produtos, adicionar um item ao pedido e finalizar o pedido. Ao adicionar um item, são validados o código do produto, a quantidade informada e a disponibilidade em estoque. Ao finalizar, o programa pergunta se o cliente possui cartão fidelidade e emite o cupom com subtotais, desconto e valor final.

## Como executar

```bash
php index.php
```

O programa é interativo: cada exercício solicita os dados pelo terminal, um após o outro.

## Observações

Todos os exercícios estão em um único `index.php`, separados por comentários.
