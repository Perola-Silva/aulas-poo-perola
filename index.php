<?php 

// Nesta forma basta indicar o uso do recurso através do namespace


use App\Notificacoes\NotificadorEmail;
use App\Notificacoes\NotificadorSms;
use App\Pedidos\Pedido;
use App\Pedidos\StatusPedido;
use App\Relatorios\Pedido AS RelatorioPedido;
use App\Saudacao;

// Substituimos todos o requires manuais de cada arquivo (classe, interface, enum)
require_once "vendor/autoload.php";

// Desta forma, precisamos passar o nome completo da classe
$notificadorEmail = new App\Notificacoes\NotificadorEmail;

$pedido1 = new Pedido(1001, "AAAAAAAA", StatusPedido::Pendente);
$pedido2 = new Pedido(1002, "Bobão da Silva", StatusPedido::Pago);
$pedido3 = new Pedido(1003, "Abobado da Silva", StatusPedido::AguardandoPagamento);
$pedido4 = new Pedido(1004, "Besta da Silva", StatusPedido::SaiuParaEntrega);

$pedido3->setStatus(StatusPedido::EmPreparacao);

$pedidos = [$pedido1, $pedido2, $pedido3, $pedido4];

// Criando um objeto a partir da clsse Pedido do subnamespace Relatorios

$relatorioPedido = new RelatorioPedido();

$saudacao = new Saudacao();

// echo "<pre>";
// var_dump($notificadorEmail);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações da loja virtual</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">Loja virtual</p>
            <h1>Notificações da loja virtual</h1>
            <p>Cada pedido possui um status</p>
            <p>Testando a saudação: <?= $saudacao->cumprimentar() ?></p>
        </header>

        <div class="conteudos">
            <?php foreach($pedidos as $pedido): ?>
            <article class="card-conteudo">
                <h2>Pedido #<?= $pedido->getNumero() ?></h2>
                <p>Cliente: <?= $pedido->getCliente() ?></p>
                <p>Status: <b class="destaque"><?= $pedido->getStatus()->value ?></b></p>
                <?php $mensagem = 'Seu pedido #'.$pedido->getNumero().' está com o status: '.$pedido->getStatus()->value; ?>
                <p><small><?= $notificadorEmail->enviar($mensagem) ?></small></p>
            </article>
            <?php endforeach; ?>
        </div>

        <hr>

        <section>
            <h2>Resumo/Total dos envios de notificações</h2>

            <!-- Note abaixo o acesso deo método estático ATRAVES da classe e com o uso do operador :: (resolução do escopo) -->
            <p>E-mails enviados: <b><?= NotificadorEmail::getQuantidadeEnviada() ?></b></p>
            <p>SMS enviados: <b><?= NotificadorSms::getQuantidadeEnviada() ?></b></p>
        </section>

        <hr>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li><b>Composer</b>: gerenciador de dependencias para PHP; aqui utilizamos apenas o recurso de <b>autoload</b></li>
                <li>Configuração de autoload no <b>composer.json</b></li>
                <li><b>PSR-4</b>: diretriz que determina a relação entre namespaces e diretorios para autoload</li>
                <li>Mapeamento do namespace <b>App\</b> para a pasta <b>src/</b></li>
                <li>Geração do autoload na index.php usando um único <b>require_once</b> apontando para <b>vendor/autoload.php</b></li>
                <li>Teste: criação da classe <b>Saudacao</b> com carregamento automático via autoload</li>
                <li><b>composer install</b>: instala dependencias e gera arquivos do autoload (desde que você tenha o compose.json)</li>
                <li>Lembrete: a past <b>vendor</b> não precisa der versionada pelo git. Por isso, a colocamos no <b>.gitignore</b></li>
            </ul>
        </div>

    </div>
</body>

</html>