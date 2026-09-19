<?php
// Samuel Rodrigues - RA: 2211715 - Turma: BCC-C - Disciplina: Programação Orientada a Objetos

require_once __DIR__ .'/vendor/autoload.php';

use App\Retangulo;
use App\ContaBancaria;
use App\Aluno;
use App\ProdutoEstoque;
use App\TermostatoInteligente;
use App\PersonagemRPG;
use App\PetVirtual;
use App\CarteiraDigital;
use App\ConfiguracaoJogo;
use App\DroneEntrega;

// Exercício 1
echo "*** 1º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;
$retangulo1 = new Retangulo(3, 3);
$area = $retangulo1->areaRetangulo();
$perimetro = $retangulo1->perimetroRetangulo();
$ehQuadrado = $retangulo1->ehQuadrado();
echo "A area do retângulo é: $area" . PHP_EOL;
echo "O perímetro do retângulo é: $perimetro" . PHP_EOL;
echo "A forma é um quadrado: " . ($ehQuadrado ? "Sim" : "Não") . PHP_EOL;

echo "--Teste 2--" . PHP_EOL;
try {
    $retangulo2 = new Retangulo(0, 3);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "--Teste 3--" . PHP_EOL;
$retangulo1->redimensionar(5, 3);
$area = $retangulo1->areaRetangulo();
$perimetro = $retangulo1->perimetroRetangulo();
$ehQuadrado = $retangulo1->ehQuadrado();
echo "A area do retângulo é: $area" . PHP_EOL;
echo "O perímetro do retângulo é: $perimetro" . PHP_EOL;
echo "A forma é um quadrado: " . ($ehQuadrado ? "Sim" : "Não") . PHP_EOL;

echo "--Teste 4--" . PHP_EOL;
$retangulo3 = new Retangulo(4, 6);
$area = $retangulo3->areaRetangulo();
$perimetro = $retangulo3->perimetroRetangulo();
$ehQuadrado = $retangulo3->ehQuadrado();
echo "A area do retângulo é: $area" . PHP_EOL;
echo "O perímetro do retângulo é: $perimetro" . PHP_EOL;
echo "A forma é um quadrado: " . ($ehQuadrado ? "Sim" : "Não") . PHP_EOL;

echo "--Teste 5--" . PHP_EOL;
$retangulo4 = new Retangulo(2, 2);
$area = $retangulo4->areaRetangulo();
$perimetro = $retangulo4->perimetroRetangulo();
$ehQuadrado = $retangulo4->ehQuadrado();
echo "A area do retângulo é: $area" . PHP_EOL;
echo "O perímetro do retângulo é: $perimetro" . PHP_EOL;
echo "A forma é um quadrado: " . ($ehQuadrado ? "Sim" : "Não") . PHP_EOL;

echo PHP_EOL;

// Exercício 2
echo "*** 2º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;
$conta1 = new ContaBancaria("Jonas", 500);
$conta1->depositar(100);
echo "Saldo da conta: " . $conta1->consultarSaldo() . PHP_EOL;
$conta1->sacar(50);
echo "Saldo da conta: " . $conta1->consultarSaldo() . PHP_EOL;
echo $conta1->resumo();

echo "--Teste 2--" . PHP_EOL;
$conta2 = new ContaBancaria("Ricardo", 1000);
$conta2->depositar(450);
echo "Saldo da conta: " . $conta2->consultarSaldo() . PHP_EOL;
$conta2->sacar(200);
echo "Saldo da conta: " . $conta2->consultarSaldo() . PHP_EOL;
echo $conta2->resumo();

echo "--Teste 3--" . PHP_EOL;
$conta3 = new ContaBancaria("Ricardo", 1000);
try {
    $conta3->depositar(-100);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
try {
    $conta3->sacar(2000);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
};
echo $conta3->resumo();

echo PHP_EOL;

// Exercício 3
echo "*** 3º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;
$aluno1 = new Aluno("João", "2332789");
$aluno1->adicionarNota(8.5);
$aluno1->adicionarNota(7.5);
$aluno1->adicionarNota(9.0);
$aluno1->adicionarNota(8.0);
echo $aluno1->resumo();

echo "--Teste 2--" . PHP_EOL;
$aluno2 = new Aluno("Livia", "3252939");
$aluno2->adicionarNota(6.5);
$aluno2->adicionarNota(7.5);
$aluno2->adicionarNota(5.0);
$aluno2->adicionarNota(6.5);
echo $aluno2->resumo();

echo "--Teste 3--" . PHP_EOL;
$aluno3 = new Aluno("Miguel", "2733683");
$aluno3->adicionarNota(1.5);
$aluno3->adicionarNota(4.5);
$aluno3->adicionarNota(3.0);
$aluno3->adicionarNota(2.0);
echo $aluno3->resumo();

echo "--Teste 4--" . PHP_EOL;
$aluno4 = new Aluno("Pedro", "2144653");
$aluno4->adicionarNota(8);
echo "ANTES DA NOTA INVÁLIDA" . PHP_EOL;
echo $aluno4->resumo();

try {
    $aluno4->adicionarNota(-2);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "DEPOIS DA NOTA INVÁLIDA" . PHP_EOL;
echo $aluno4->resumo();

echo PHP_EOL;

// Exercício 4
echo "*** 4º Exercício TESTES ***" . PHP_EOL;

$produto1 = new ProdutoEstoque("Maça", 2.50, 10);
$produto2 = new ProdutoEstoque("Mostrada", 4.60, 5);

echo "--Teste 1--" . PHP_EOL;
echo "VALOR ANTES DESCONTO: R$ " . number_format($produto1->consultarPreco(), 2, ',', '.') . PHP_EOL;
$produto1->aplicarDesconto(10);
echo "VALOR DEPOIS DESCONTO: R$ " . number_format($produto1->consultarPreco(), 2, ',', '.') . PHP_EOL;

echo "--Teste 2--" . PHP_EOL;
echo "ESTOQUE ANTES DA REPOSIÇÃO: " . $produto1->consultarEstoque() . PHP_EOL;
$produto1->repor(10);
echo "ESTOQUE DEPOIS DA REPOSIÇÃO: " . $produto1->consultarEstoque() . PHP_EOL;
echo "ESTOQUE ANTES DA RESERVA: " . $produto1->consultarEstoque() . PHP_EOL;
$produto1->reservar(3);
echo "ESTOQUE DEPOIS DA RESERVA: " . $produto1->consultarEstoque() . PHP_EOL;

echo "--Teste 3--" . PHP_EOL;
echo "VALOR ANTES DESCONTO: R$ " . number_format($produto2->consultarPreco(), 2, ',', '.') . PHP_EOL;
try {
    $produto2->aplicarDesconto(60);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
echo "VALOR DEPOIS DESCONTO: R$ " . number_format($produto2->consultarPreco(), 2, ',', '.') . PHP_EOL;

echo "ESTOQUE ANTES DA RESERVA: " . $produto2->consultarEstoque() . PHP_EOL;
try {
    $produto2->reservar(10);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
echo "ESTOQUE DEPOIS DA RESERVA: " . $produto2->consultarEstoque() . PHP_EOL;

echo "--Teste 4--" . PHP_EOL;
echo $produto1->consultarProduto() . PHP_EOL;
echo $produto2->consultarProduto();

echo PHP_EOL;

// Exercício 5
echo "*** 5º Exercício TESTES ***" . PHP_EOL;

$termostato = new TermostatoInteligente(18, 28);

echo "--Teste 1: Desligado e ligado--" . PHP_EOL;

echo "Estado: " . $termostato->acaoNecessaria() . PHP_EOL;
$termostato->ligar();
echo "Estado: " . $termostato->acaoNecessaria() . PHP_EOL;


echo "--Teste 2: Status Temperatura--" . PHP_EOL;

echo "--Temperatura abaixo da alvo--" . PHP_EOL;
$termostato->atualizarTemperaturaAtual(25);
echo "Temperatura atual: 25°C" . PHP_EOL;
echo "Ação: " . $termostato->acaoNecessaria() . PHP_EOL;


echo "--Temperatura acima da alvo--" . PHP_EOL;
$termostato->atualizarTemperaturaAtual(30);
echo "Temperatura atual: 30°C" . PHP_EOL;
echo "Ação: " . $termostato->acaoNecessaria() . PHP_EOL;

echo "--Temperatura igual à alvo--" . PHP_EOL;
$termostato->atualizarTemperaturaAtual(28);
echo "Temperatura atual: 28°C" . PHP_EOL;
echo "Ação: " . $termostato->acaoNecessaria() . PHP_EOL;


echo "--Teste 3: Temperatura alvo inválida--" . PHP_EOL;

try {
    $termostato->definirTemperaturaAlvo(32);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

//Exercício 6
echo "*** 6º Exercício TESTES ***" . PHP_EOL;

echo "-- Teste 1: Criando os personagens --" . PHP_EOL;
$personagem1 = new PersonagemRPG("Guerreiro", 100);
$personagem2 = new PersonagemRPG("Mago", 70);
echo "Personagem 1: Guerreiro - Vida máxima: 100" . PHP_EOL;
echo "Personagem 2: Mago - Vida máxima: 70" . PHP_EOL;

echo PHP_EOL;

echo "-- Teste 2: Dano, cura, ataque e descanso --" . PHP_EOL;

echo "Guerreiro sofre 30 de dano." . PHP_EOL;
$personagem1->sofrerDano(30);

echo "Guerreiro utiliza 20 de cura." . PHP_EOL;
$personagem1->curar(20);

echo "Guerreiro realiza um ataque." . PHP_EOL;

try {
    $dano = $personagem1->executarAtaque(30, 50);
    echo "Ataque realizado! Dano causado: {$dano}" . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "Guerreiro descansa para recuperar energia." . PHP_EOL;
$personagem1->descansar();

echo PHP_EOL;

echo "-- Teste 3: Ataque sem energia suficiente --" . PHP_EOL;

try {
    // Primeiro ataque custa 80
    $personagem2->executarAtaque(80, 40);
    
    // Restam apenas 20 de energia.
    // Segundo ataque custa 30.
    $personagem2->executarAtaque(30, 40);

} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

echo "-- Teste 4: Cura acima da vida máxima --" . PHP_EOL;

$personagem1->sofrerDano(20);
echo "Personagem sofreu 20 de dano." . PHP_EOL;

echo "Tentando recuperar 1000 pontos de vida..." . PHP_EOL;
$personagem1->curar(1000);
echo "Cura realizada sem ultrapassar a vida máxima." . PHP_EOL;

echo PHP_EOL;

echo "-- Teste 5: Personagem derrotado --" . PHP_EOL;

$personagem1->sofrerDano(1000);
echo "Guerreiro recebeu dano suficiente para chegar a 0 de vida." . PHP_EOL;
echo "Status: " . $personagem1->status() . PHP_EOL;

echo PHP_EOL;

echo "-- Teste 6: Tentativa de ataque após derrota --" . PHP_EOL;

try {
    $personagem1->executarAtaque(10, 50);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

//Exercício 7
echo "*** 7º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;

$pet = new PetVirtual("Rex");
echo $pet->status();

echo PHP_EOL;

echo "--Teste 2--" . PHP_EOL;

echo "Depois de alimentar:" . PHP_EOL;
$pet->alimentar();
echo $pet->status();

echo "Depois de brincar:" . PHP_EOL;
$pet->brincar();
echo $pet->status();

echo "Depois de dormir:" . PHP_EOL;
$pet->dormir();
echo $pet->status();

echo PHP_EOL;

echo "--Teste 3--" . PHP_EOL;

echo "Antes das ações repetidas:" . PHP_EOL;
echo $pet->status();

echo "Brincando novamente..." . PHP_EOL;
$pet->brincar();

echo "Brincando novamente..." . PHP_EOL;
$pet->brincar();

echo "Brincando novamente..." . PHP_EOL;
$pet->brincar();

echo $pet->status();

echo PHP_EOL;

echo "--Teste 4--" . PHP_EOL;

echo "Dormindo para aumentar a energia:" . PHP_EOL;
$pet->dormir();
$pet->dormir();
$pet->dormir();
echo $pet->status();

echo "Alimentando para reduzir a fome:" . PHP_EOL;
$pet->alimentar();
$pet->alimentar();
$pet->alimentar();
echo $pet->status();

echo PHP_EOL;

echo "*** 8º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;

$carteira = new CarteiraDigital("João", 500, 300);
echo $carteira->resumo();

echo "Recebendo R$ 200,00..." . PHP_EOL;
$carteira->receber(200);
echo $carteira->resumo();

echo "Pagando R$ 100,00..." . PHP_EOL;
$carteira->pagarPix(100);
echo $carteira->resumo();

echo "--Teste 2--" . PHP_EOL;

echo "Tentando pagar R$ 1000,00..." . PHP_EOL;

try {
    $carteira->pagarPix(1000);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "Tentando pagar R$ 250,00..." . PHP_EOL;

try {
    $carteira->pagarPix(250);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo $carteira->resumo();

echo "--Teste 3--" . PHP_EOL;

echo "Iniciando um novo dia..." . PHP_EOL;
$carteira->iniciarNovoDia();
echo $carteira->resumo();

echo "Pagando R$ 250,00 no novo dia..." . PHP_EOL;
$carteira->pagarPix(250);
echo $carteira->resumo();

echo PHP_EOL;

echo "*** 9º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;

$original = new ConfiguracaoJogo(70, "normal");

echo "CONFIGURAÇÃO ORIGINAL:" . PHP_EOL;
echo $original->resumo();

$atalho = $original;

$atalho->alterarVolume(30);
$atalho->alterarDificuldade("dificil");
$atalho->alternarTelaCheia();

echo "CONFIGURAÇÃO PELO ATALHO:" . PHP_EOL;
echo $atalho->resumo();

echo "CONFIGURAÇÃO ORIGINAL APÓS ALTERAÇÃO DO ATALHO:" . PHP_EOL;
echo $original->resumo();

if ($original === $atalho) {
    echo "Original === Atalho: são a mesma instância." . PHP_EOL;
}

echo PHP_EOL;

echo "--Teste 2--" . PHP_EOL;

$copia = clone $original;

$copia->alterarVolume(90);
$copia->alterarDificuldade("facil");

echo "CONFIGURAÇÃO ORIGINAL:" . PHP_EOL;
echo $original->resumo();

echo "CONFIGURAÇÃO DA CÓPIA:" . PHP_EOL;
echo $copia->resumo();

if ($original === $copia) {
    echo "Original === Cópia: são a mesma instância." . PHP_EOL;
} else {
    echo "Original === Cópia: são instâncias diferentes." . PHP_EOL;
}

echo PHP_EOL;

echo "*** 10º Exercício TESTES ***" . PHP_EOL;

echo "--Teste 1--" . PHP_EOL;

$drone1 = new DroneEntrega("DR-001", 5);
echo $drone1->status();

echo "Carregando pacote de 3 kg..." . PHP_EOL;
$drone1->carregarPacote(3);
echo $drone1->status();

echo "Decolando para uma distância de 5 km..." . PHP_EOL;
$drone1->decolar(5);
echo $drone1->status();

echo "Finalizando entrega..." . PHP_EOL;
$drone1->finalizarEntrega();
echo $drone1->status();

echo "--Teste 2--" . PHP_EOL;

echo "Tentando carregar pacote acima da capacidade..." . PHP_EOL;

try {
    $drone1->carregarPacote(10);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "Tentando decolar sem pacote..." . PHP_EOL;

try {
    $drone1->decolar(5);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo "--Teste 3--" . PHP_EOL;

$drone2 = new DroneEntrega("DR-002", 10);

echo $drone2->status();

echo "Carregando pacote de 5 kg..." . PHP_EOL;
$drone2->carregarPacote(5);

echo "Tentando realizar uma entrega de 11 km..." . PHP_EOL;

try {
    $drone2->decolar(11);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

echo $drone2->status();

echo "--Teste 4--" . PHP_EOL;

echo "Recarregando o drone..." . PHP_EOL;
$drone2->recarregar();
echo $drone2->status();

echo "Realizando uma nova entrega..." . PHP_EOL;
$drone2->decolar(5);
echo $drone2->status();

echo PHP_EOL;
?>