<?php
class NotificadorEmail implements Notificador
{
    public function enviar(string $mensagem): string
    {
        return "SMS: $mensagem";
    }
}