<?php 
require_once "src/Filme.php";

// Criando um OBJETO ou uma INSTÂNCIA a partir da classe Filme
$filme1 = new Filme('De Volta Para o Futuro', 'Ficcão', 1985);
$filme2 = new Filme('Toy Story', 'Animação', 1995);
$filme3 = new Filme('Homem Aranha', 'Ação', 2026);

$filmes = [$filme1, $filme2, $filme3];

// echo '<pre>';
// var_dump($filmes);
// echo '</pre>';
?>

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

        <?php foreach($filmes as $filme): ?>
            <article class="card-filme">
                <span class="genero"><?= $filme->getAno() ?></span>
                <h2><?= $filme->getTitulo() ?></h2>
                <p class="ano"><?= $filme->getGenero() ?></p>

                <?php if($filme->ehClassico()): ?>
                    <span class="classico">Clássico</span>
                <?php endif; ?>
            </article>
        <?php endforeach ?>
        </div>

        <hr>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li>Finalidade do construtor</li>
                <li>Implementação do método <code>__construct</code></li>
                <li>Parâmetros/Argumentos do construtor</li>
                <li>Passagem de dados/valores ao criar objetos</li>
                <li>Atribuição de valores para as propriedades usando o construtor</li>
                <li>Uso de <code>setter</code> a partir do construtor</li>
            </ul>
        </div>

    </div>
</body>

</html>