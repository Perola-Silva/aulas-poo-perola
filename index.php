<?php 
require_once "src/Notificador.php";
require_once "src/NotificadorEmail.php";
require_once "src/NotificadorSms.php";

$notificadorEmail = new NotificadorEmail();
$notificadorSms = new NotificadorSms();

$notificadores = [$notificadorEmail, $notificadorSms];

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

        <?php 
            $conteudoDaMensagem = "Seu pedido '123abc' foi confirmado";
            foreach($notificadores as $notificador):
        ?>
            <article class="card-conteudo">
                <h2>Notificação sobre o pedido:</h2>
                <p><?= $notificador->enviar($conteudoDaMensagem) ?></p>
            </article>
        <?php endforeach; ?>
        </div>

        <hr>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li>Interface <b>Notificador</b> como um contrato de comportamentos (métodos)</li>
                <li>Definição do método <b>enviar(string $mensagem): string</b> na interface</li>
                <li>Implementação da interface de <b>implements</b> nas classes <b>NotificadorEmail</b> e <b>NotificadorSms</b></li>
                <li>Implementação do metodo <b>enviar</b> em cada classe</li>
                <li>Poliformismo: a mesma chamada a <b>enviar</b> utiliza a implementação de cada classe</li>
            </ul>
        </div>

    </div>
</body>

</html>