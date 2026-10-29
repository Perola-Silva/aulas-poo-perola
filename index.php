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
            <p>Cada pedido possui um status</p>
        </header>

        <div class="conteudos">
            <article class="card-conteudo">
                
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
                
            </ul>
        </div>

    </div>
</body>

</html>