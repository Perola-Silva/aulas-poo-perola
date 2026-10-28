<?php
class NotificadorEmail implements Notificador
{
    // Implementação do método enviar de acordo com os padrões na interface: mesmo nome, mesma quantidade de parâmetros, mesmo tipo de dados dos parâmetros de dados dos parâmetros, mesmo tipo de retorno esperado.
    public function enviar(string $mensagem): string
    {
        return "E-mail: $mensagem";
    }
}