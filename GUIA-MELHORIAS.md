# Guia do projeto: explicação e dicas para melhorar o código

Este documento explica como o projeto funciona e sugere melhorias graduais. A ideia é manter o exemplo simples enquanto você aprende Programação Orientada a Objetos (POO) em PHP.

## Visão geral

O projeto mostra pedidos de uma loja e simula notificações por e-mail e SMS. Os arquivos principais são:

- [`index.php`](./index.php): cria os objetos, monta a lista de pedidos e exibe a página HTML.
- [`src/Pedido.php`](./src/Pedido.php): representa um pedido e guarda seu número, cliente e status.
- [`src/StatusPedido.php`](./src/StatusPedido.php): enumeração com os status possíveis.
- [`src/Notificador.php`](./src/Notificador.php): interface que define o contrato de um notificador.
- [`src/NotificadorEmail.php`](./src/NotificadorEmail.php) e [`src/NotificadorSms.php`](./src/NotificadorSms.php): implementam esse contrato e contam os envios simulados.
- [`css/estilo.css`](./css/estilo.css): define a aparência e o comportamento responsivo da página.

## Como o código funciona

### 1. Os status do pedido

Em `StatusPedido.php`, `enum StatusPedido: string` define um conjunto fechado de opções. Em vez de aceitar qualquer texto como status, o programa pode usar apenas os casos declarados, como `StatusPedido::Pago` e `StatusPedido::EmPreparacao`.

Cada caso tem um valor textual, por exemplo, `StatusPedido::EmPreparacao->value` resulta em `"Em preparação"`. Enums com valores associados exigem PHP 8.1 ou superior.

### 2. A classe `Pedido`

`Pedido.php` agrupa os dados relacionados a um pedido. As propriedades são `private`, então o restante do programa acessa seus valores por meio dos métodos públicos `getNumero()`, `getCliente()` e `getStatus()`.

O construtor recebe os valores iniciais. Os tipos declarados — `int`, `string` e `StatusPedido` — deixam mais claro quais dados cada propriedade aceita. Os métodos `set...()` permitem alterar esses dados depois da criação do objeto.

### 3. O contrato de notificação

`Notificador.php` declara os métodos que uma classe notificadora deve oferecer: `enviar()` e `getQuantidadeEnviada()`. As classes que usam `implements Notificador` precisam implementar os métodos com as assinaturas compatíveis.

`NotificadorEmail` e `NotificadorSms` implementam esse contrato de formas parecidas. Cada uma tem seu próprio contador estático. Assim, `NotificadorEmail::getQuantidadeEnviada()` consulta o total do e-mail, sem precisar de um objeto para ler o contador.

Neste exemplo, `enviar()` apenas incrementa o contador e devolve uma string. Ele **não envia uma mensagem de verdade** por e-mail ou SMS.

### 4. A página

No começo de `index.php`, os arquivos PHP são carregados com `require_once`. Em seguida, o script cria um notificador de e-mail e quatro pedidos, altera o status de um pedido e guarda todos em um array.

O `foreach` percorre a lista e gera um cartão HTML para cada pedido. Para cada cartão, o código monta uma mensagem e chama `$notificadorEmail->enviar($mensagem)`. No final, os métodos estáticos exibem os contadores de e-mail e SMS.

### 5. O CSS

`estilo.css` controla cores, espaçamentos, cartões e o layout responsivo. A regra `@media (min-width: 800px)` ajusta o layout para telas maiores. Há também seletores como `.genero`, `.ano` e `.classico` que não parecem ser usados no HTML atual; vale confirmar antes de removê-los.

## Dicas de melhoria

### Prioridade 1: escapar valores exibidos no HTML

Mesmo que os dados sejam fixos agora, valores vindos de formulários ou de um banco de dados não devem ser inseridos diretamente no HTML. Escape-os com `htmlspecialchars()`:

```php
<?= htmlspecialchars($pedido->getCliente(), ENT_QUOTES, 'UTF-8') ?>
```

Faça isso também para qualquer outro texto dinâmico exibido na página, incluindo a mensagem de notificação. Isso evita que caracteres do conteúdo sejam interpretados como HTML.

### Prioridade 2: evitar alterações inválidas no pedido

O número e o cliente podem ser modificados atualmente pelos setters, embora normalmente identifiquem o pedido e seu responsável. Considere não oferecer `setNumero()` e `setCliente()` se esses valores não devem mudar após a criação.

Também pode ser útil validar o número no construtor (por exemplo, exigir um valor positivo) e definir quais mudanças de status são permitidas. Por enquanto, `setStatus()` aceita qualquer status do enum, sem verificar a sequência do processo.

### Prioridade 3: deixar a criação dos pedidos mais fácil de manter

Os pedidos são criados manualmente dentro de `index.php`. Conforme a lista crescer, você pode obter esses dados de uma fonte separada, como um arquivo de dados ou banco de dados, e manter a página responsável principalmente pela apresentação.

Outra melhoria é mover o HTML para um arquivo de visualização. Assim, a lógica de criação dos objetos e a apresentação ficam menos misturadas.

### Prioridade 4: usar o contrato `Notificador` de forma explícita

O código cria diretamente `NotificadorEmail`, embora a interface permita também trabalhar com SMS. Uma variável tipada pela interface ajuda a depender do contrato, e não de uma implementação específica:

```php
function exibirNotificacao(Notificador $notificador, string $mensagem): void
{
    echo htmlspecialchars(
        $notificador->enviar($mensagem),
        ENT_QUOTES,
        'UTF-8'
    );
}
```

Esse exemplo demonstra o uso da interface; ele não substitui a integração real com serviços de envio.

### Prioridade 5: esclarecer o comportamento dos contadores

Os contadores estáticos valem apenas durante a execução atual do PHP. Em uma nova requisição da página, eles começam novamente em zero. Para um exercício, esse comportamento é útil para demonstrar propriedades estáticas; para um histórico real, seria necessário persistir os envios, por exemplo, em um banco de dados.

Também é bom definir o que significa “enviado”: neste exemplo, a contagem aumenta quando o método é chamado, não quando um provedor confirma a entrega.

### Próximos passos

1. Aplicar `htmlspecialchars()` nos dados dinâmicos da página.
2. Decidir quais dados do pedido podem ser alterados depois da criação.
3. Criar testes simples para a construção do pedido, a mudança de status e os contadores.
4. Se o projeto crescer, considerar autoload do Composer em vez de manter vários `require_once` manuais.

Faça uma mudança por vez e rode a página novamente para observar o efeito. Isso ajuda a entender cada conceito sem perder a simplicidade do exemplo.
