# 05 - Lista de Exercícios 1: Classes

Lista de dez exercícios de modelagem de classes, com foco em encapsulamento, validação de dados e tratamento de exceções.

## Tópicos abordados

- Encapsulamento com propriedades `private`
- Validação de dados no construtor e nos métodos
- Métodos privados auxiliares de validação
- Lançamento e captura de `InvalidArgumentException`
- Controle de estado do objeto
- Referência a objetos e clonagem (`clone`)
- Namespaces e autoload PSR-4 com Composer

## Exercícios

| Nº | Classe | Descrição |
|---|---|---|
| 1 | `Retangulo` | Área, perímetro, verificação de quadrado e redimensionamento, com validação das dimensões |
| 2 | `ContaBancaria` | Depósito, saque e consulta de saldo, com validação de valores e de saldo disponível |
| 3 | `Aluno` | Registro de notas entre 0 e 10, cálculo da média e situação (aprovado, recuperação ou reprovado) |
| 4 | `ProdutoEstoque` | Aplicação de desconto (máximo de 50%), reposição e reserva de estoque |
| 5 | `TermostatoInteligente` | Liga e desliga, temperatura alvo entre 16 °C e 30 °C e ação necessária (aquecer, resfriar ou manter) |
| 6 | `PersonagemRPG` | Vida e energia, dano, cura limitada à vida máxima, ataque com custo de energia e descanso |
| 7 | `PetVirtual` | Fome, energia e felicidade limitadas entre 0 e 100, com as ações alimentar, brincar e dormir |
| 8 | `CarteiraDigital` | Saldo, recebimento e pagamento via Pix com limite diário, e reinício do limite a cada novo dia |
| 9 | `ConfiguracaoJogo` | Volume, dificuldade e tela cheia; compara atribuição por referência com clonagem de objetos |
| 10 | `DroneEntrega` | Bateria, carga máxima e status; carregamento, decolagem com consumo por distância, entrega e recarga |

## Estrutura

```
05-classes-lista-1/
├── composer.json
├── composer.lock
├── index.php
└── src/
    ├── Aluno.php
    ├── CarteiraDigital.php
    ├── ConfiguracaoJogo.php
    ├── ContaBancaria.php
    ├── DroneEntrega.php
    ├── PersonagemRPG.php
    ├── PetVirtual.php
    ├── ProdutoEstoque.php
    ├── Retangulo.php
    └── TermostatoInteligente.php
```

## Como executar

```bash
composer install
php index.php
```

O comando `composer install` gera o diretório `vendor/` com o autoloader (mapeamento PSR-4 do namespace `App\` para `src/`). O diretório não é versionado.

O `index.php` executa, para cada exercício, cenários de teste que cobrem o funcionamento normal e os casos de erro. As exceções lançadas pelas classes são capturadas e exibidas no terminal.
