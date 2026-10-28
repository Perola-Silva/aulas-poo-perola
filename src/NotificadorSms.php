<?php
class NotificadorSms implements Notificador
{
    public function enviar(string $mensagem): string
    {
        return "SMS: $mensagem";
    }
}