# 06 - Lista de Exercícios 2: Classes

Segunda lista de exercícios de modelagem de classes, com foco em encapsulamento, regras de negócio, controle de estado e, nos exercícios finais, modelagem livre a partir de um cenário descrito em texto.

## Tópicos abordados

- Encapsulamento com propriedades `private` e `public`
- Property promotion no construtor
- Validação de dados no construtor e nos métodos
- Métodos que alteram estado apenas quando as regras permitem
- Retorno de valores booleanos para indicar sucesso ou falha de uma operação
- Derivação de estado (como um status) a partir de outras propriedades, sem uma propriedade própria para isso
- Modelagem livre: identificação de classe, propriedades e regras a partir de um cenário (exercícios 17 a 20)

## Exercícios

| Nº | Arquivo de teste | Classe | Descrição |
|---|---|---|---|
| 1 | `ex01-retangulo.php` | `Retangulo` | Área, perímetro, verificação de quadrado e redimensionamento, com validação das dimensões |
| 2 | `ex02-temperatura.php` | `Temperatura` | Conversão entre Celsius, Fahrenheit e Kelvin, com validação do zero absoluto |
| 3 | `ex03-ingressoCinema.php` | `IngressoCinema` | Valor final de um ingresso, integral ou com meia-entrada |
| 4 | `ex04-cronometro.php` | `CronometroTreino` | Tempo acumulado de treino, com soma de valores positivos e formatação em HH:MM:SS |
| 5 | `ex05-triangulo.php` | `Triangulo` | Validação da desigualdade triangular, classificação (equilátero, isósceles, escaleno ou inválido) e perímetro |
| 6 | `ex06-ticket.php` | `TicketEstacionamento` | Duração e valor de uma permanência, com tarifa por hora arredondada para cima |
| 7 | `ex07-semaforo.php` | `Semaforo` | Sequência de cores vermelho, verde e amarelo, com contagem de ciclos completos |
| 8 | `ex08-lampadaInteligente.php` | `LampadaInteligente` | Liga, desliga e ajuste de intensidade entre 0 e 100 |
| 9 | `ex09-personagem.php` | `PersonagemRPG` | Vida e energia limitadas entre 0 e 100, dano, cura, uso de habilidade e descanso |
| 10 | `ex10-cofrinho.php` | `CofrinhoMeta` | Depósitos, retiradas e progresso em relação a uma meta de economia |
| 11 | `ex11-cartao.php` | `CartaoTransporte` | Recarga de crédito e embarques, descontando a tarifa apenas com saldo suficiente |
| 12 | `ex12-hidrometro.php` | `Hidrometro` | Registro de leituras sucessivas e cálculo do consumo do período |
| 13 | `ex13-maquina.php` | `MaquinaSnack` | Estoque, crédito, compra e devolução de crédito de uma máquina de vendas |
| 14 | `ex14-bateria.php` | `BateriaDispositivo` | Consumo de carga por tempo de uso, recarga sem ultrapassar 100% e nível crítico |
| 15 | `ex15-drone.php` | `DroneInspecao` | Decolagem, voo com consumo de bateria por distância, pouso e recarga |
| 16 | `ex16-pacote.php` | `PacoteEntrega` | Transições de status de um pacote (aguardando, em rota, entregue ou devolução) conforme o número de tentativas |
| 17 | `ex17-locker.php` | `CompartimentoLocker` | Modelagem livre: depósito e retirada de encomendas com código, e bloqueio após tentativas incorretas |
| 18 | `ex18-plano.php` | `PlanoDados` | Modelagem livre: franquia, saldo e consumo de um plano de dados móvel, com compra de pacotes adicionais |
| 19 | `ex19-robo.php` | `RoboArena` | Modelagem livre: energia, integridade estrutural e pontuação de um robô de combate |
| 20 | `ex20-astronauta.php` | `AstronautaMarte` | Modelagem livre: vida, energia e oxigênio de um astronauta, com exploração, descanso e uso de cilindro de oxigênio |

## Estrutura

```
06-classes-lista-2/
├── composer.json
├── composer.lock
├── ex01-retangulo.php
├── ex02-temperatura.php
├── ex03-ingressoCinema.php
├── ex04-cronometro.php
├── ex05-triangulo.php
├── ex06-ticket.php
├── ex07-semaforo.php
├── ex08-lampadaInteligente.php
├── ex09-personagem.php
├── ex10-cofrinho.php
├── ex11-cartao.php
├── ex12-hidrometro.php
├── ex13-maquina.php
├── ex14-bateria.php
├── ex15-drone.php
├── ex16-pacote.php
├── ex17-locker.php
├── ex18-plano.php
├── ex19-robo.php
├── ex20-astronauta.php
└── src/
    ├── AstronautaMarte.php
    ├── BateriaDispositivo.php
    ├── CartaoTransporte.php
    ├── CofrinhoMeta.php
    ├── CompartimentoLocker.php
    ├── CronometroTreino.php
    ├── DroneInspecao.php
    ├── Hidrometro.php
    ├── IngressoCinema.php
    ├── LampadaInteligente.php
    ├── MaquinaSnack.php
    ├── PacoteEntrega.php
    ├── PersonagemRPG.php
    ├── PlanoDados.php
    ├── Retangulo.php
    ├── RoboArena.php
    ├── Semaforo.php
    ├── Temperatura.php
    ├── TicketEstacionamento.php
    └── Triangulo.php
```

## Como executar

```bash
composer install
php ex01-retangulo.php
```

O comando `composer install` gera o diretório `vendor/` com o autoloader (mapeamento PSR-4 do namespace `App\` para `src/`). O diretório não é versionado. Troque o nome do arquivo para rodar cada exercício individualmente.