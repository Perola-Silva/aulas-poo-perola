<?php 
require_once "src/Filme.php";

// Criando um OBJETO ou uma INSTÂNCIA a partir da classe Filme
$filme1 = new Filme();

$filme2 = new Filme();

$filme3 = new Filme();

?>
<pre>
<?php var_dump($filme1, $filme2, $filme3) ?>
</pre>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Coleção de Filmes</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">Uma sessão de boas histórias</p>
            <h1>Minha coleção de filmes</h1>
            <p>Três filmes para descobrir, rever e se divertir</p>
        </header>

        <div class="filmes">

            <article>

            </article>

        </div>

        <hr>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>

            </ul>
        </div>

    </div>
</body>

</html>