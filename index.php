<?php 
require_once "src/Notificador.php";
require_once "src/NotificadorEmail.php";
require_once "src/NotificadorSms.php";

$notificadorEmail = new NotificadorEmail();
$notificadorSms = new NotificadorSms();

// Pedido 123abc
$emailPedido1 = $notificadorEmail->enviar('Seu pedido 123abc foi confirmado');
$smsPedido1 = $notificadorSms->enviar('Seu pedido 123abc foi confirmado');

// Pedido 789xyz
$emailPedido2 = $notificadorEmail->enviar('Seu pedido 789xyz foi confirmado');

// Pedido 456asd
$emailPedido3 = $notificadorEmail->enviar('Seu pedido 456asd foi confirmado');



// echo "<pre>";
// var_dump($);
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
            <p>Simulação de notificações sobre pedidos por e-mail e SMS</p>
        </header>

        <div class="conteudos">
            <article class="card-conteudo">
                <h2>Notificação: Pedido 123abc</h2>
                <p><?= $emailPedido1 ?></p>
                <p><?= $smsPedido1 ?></p>
            </article>

            <article class="card-conteudo">
                <h2>Notificação: Pedido 789xyz</h2>
                <p><?= $emailPedido2 ?></p>
                <p></p>
            </article>

            <article class="card-conteudo">
                <h2>Notificação: Pedido 456asd</h2>
                <p><?= $emailPedido3 ?></p>
                <p></p>
            </article>
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
                <li>Propriedades estáticas usando <b>static</b></li>
                <li>Métodos estáticos usando <b>static</b></li>
                <li>Acesso a recursos estáticos da própria classe usando o <b>self</b></li>
                <li>Diferença entre usar recursos estáticos e recrsos de objetos</li>
            </ul>
        </div>

    </div>
</body>

</html>