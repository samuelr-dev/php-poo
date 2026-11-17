# Central de Locação de Veículos

Exercício de fixação de herança, classe abstrata, polimorfismo e controle de extensão em PHP 8.4. O sistema calcula o valor de reservas de carros, motocicletas e bicicletas, cada categoria com sua própria regra de cobrança, a partir de uma estrutura comum.

## Identificação

- Nome completo: Samuel Rodrigues
- RA: 2211715
- Turma: C - BCC
- Disciplina: Programação Orientada a Objetos

## Modelagem

| Classe | Papel |
|---|---|
| `Veiculo` | Classe abstrata com código, modelo e valor da diária (privados, com consulta por métodos), a descrição com a identificação comum e a operação `cotar()` |
| `Carro` | Acrescenta a quantidade de portas e uma taxa única de limpeza de R$ 50,00 por reserva |
| `Motocicleta` | Acrescenta a cilindrada e um seguro de R$ 15,00 por dia |
| `Bicicleta` | Acrescenta o tipo (urbana ou elétrica) e um desconto de 10% em reservas de sete dias ou mais |

### Conceitos aplicados

- **Classe abstrata:** `Veiculo` não pode ser instanciada, então todo objeto cadastrado representa uma categoria concreta.
- **Encapsulamento:** código, modelo e diária são `private`, com validação no construtor e consulta por `getCodigo()`, `getModelo()` e `getValorDiaria()`.
- **Construtores:** cada categoria valida a sua informação específica e chama `parent::__construct()` para os dados comuns.
- **Controle de extensão:** `cotar()` é `final`, então as categorias não podem redefinir a validação dos dias, e as três classes concretas são `final`.
- **Método abstrato:** `calcularValor()` é `protected abstract`, e cada categoria fornece a sua regra. Ele só é alcançado por meio de `cotar()`.
- **Sobrescrita:** `descricao()` é sobrescrito em cada categoria, reaproveitando a identificação comum com `parent::descricao()`.
- **Polimorfismo:** o `index.php` percorre uma única lista de `Veiculo` e usa as mesmas chamadas (`descricao()` e `cotar()`), sem verificar a classe concreta.

## Estrutura

```
08-exercicio-heranca-classe-abstrata/
├── composer.json
├── composer.lock
├── index.php
├── README.md
└── src/
    ├── Bicicleta.php
    ├── Carro.php
    ├── Motocicleta.php
    └── Veiculo.php
```

## Valores para conferência

| Veículo | Diária | Período | Total |
|---|---|---|---|
| Carro | R$ 100,00 | 3 dias | R$ 350,00 |
| Motocicleta | R$ 60,00 | 3 dias | R$ 225,00 |
| Bicicleta | R$ 40,00 | 6 dias | R$ 240,00 |
| Bicicleta | R$ 40,00 | 7 dias | R$ 252,00 |

## Instalação e execução

Requisitos:

- PHP 8.4 ou superior
- [Composer](https://getcomposer.org/)

A partir da pasta do projeto:

```bash
composer install
php index.php
```

O comando `composer install` gera o diretório `vendor/` com o autoloader (mapeamento PSR-4 do namespace `App\` para `src/`). O diretório não é versionado nem incluído na entrega.

## Situações demonstradas no `index.php`

- Cadastro de um carro, uma motocicleta e uma bicicleta.
- Descrição e cotação de 3 dias de cada veículo, percorrendo uma única lista.
- Duas cotações da mesma bicicleta, de 6 e de 7 dias, evidenciando o desconto.
- Rejeição de quantidade de dias igual a zero ou negativa.
- Rejeição de cadastros inválidos: diária zero ou negativa, código vazio, quantidade de portas ou cilindrada não positivas e tipo de bicicleta fora das duas opções.
- Consulta dos dados após as cotações, mostrando que a diária não é alterada.
