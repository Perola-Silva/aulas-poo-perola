<?php

// A interface define os métods que cada classe deve implementar obrigatoriamente. Podemos dizer que inteface é como um contrato, em que as assinaturas (métodos) deverão ser honradas.

// Usamos a interface para garantir que todas as classes que a utilizarem, sigam um mesmo padrão definido nos métodos. Ainda assim, cada classe poderá ter uma implementação diferente no corpo do método (polimorfismo)

// Namespace principal/raiz: App (pode ser qualquer nome)
// Seguido de \ e o nome do subnamespace (nome da pasta)
namespace App\Notificacoes;

interface Notificador
{
    // O padrão definido aqui é nome, parâmetros, tipo de dados dos parâmetros e tipo de retorno do método
    public function enviar(string $mensagem): string;
    public static function getQuantidadeEnviada(): int;
}