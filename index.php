<?php 
// Importando a superclasse/pai: Conteudo
require_once "src/Conteudo.php";

// Importando as subclasses/filhas: Filme e Serie (que herda de Conteudo)
require_once "src/Filme.php";
require_once "src/Serie.php";

// Criando os objetos e passando os dados para o construtor
$filme1 = new Filme('De Volta para o Futuro', 'Ficcão', 1985, 116);
$filme2 = new Filme('Toy Story', 'Animação', 1995, 105);
$filme3 = new Filme('Homem Aranha', 'Ação', 2026, 145);

$serie1 = new Serie("Friends", "Comédia", 1992, 24);
$serie2 = new Serie("Supernatural", "Suspense", 2005, 20);

// $series = [$serie1, $serie2];
// $filmes = [$filme1, $filme2, $filme3];

// Como a classe conteudo foi definida como abstrata a linha abaixo não funcionara, pois não é possivel criar objetos ou instancias diretamente à partir de classes abstratas.

// $conteudo = new Conteudo('Senhor dos Anéis', 'Fantasia', 2001);

$conteudos = [$filme1, $filme2, $serie1, $serie2];

// echo "<pre>";
// var_dump($);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Coleção de Filmes e Series</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">Uma sessão de boas histórias</p>
            <h1>Minha coleção de filmes</h1>
            <p>Três filmes para descobrir, rever e se divertir</p>
        </header>

        <div class="conteudos">

        <?php foreach($conteudos as $conteudo): ?>
            <article class="card-conteudo">
                <span class="genero"> <?= $conteudo->getGenero() ?> </span>
                <h2> <?= $conteudo->getTitulo() ?> </h2>
                <p class="ano">Lançamento: <?= $conteudo->getAno() ?> </p>

                <!-- POLIMORFISMO: A mesma chamada (getDescricao) de método, mas usando implementações diferentes -->
                <p> <?= $conteudo->getDescricao() ?> </p>

                <?php if( $conteudo->ehClassico() ): ?>
                    <span class="classico">Clássico</span>
                <?php endif; ?>

            </article>
        <?php endforeach; ?>

        </div>

        <hr>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li>Classe abstrata: <b>Conteudo</b></li>
                <li>Impossibilidade de instanciar diretamenre um classe abstrata</li>
                <li>Método abstrato: <b>getDescricao()</b></li>
                <li>Obriga a implementação do método abstrato para classes filhas Filme e Serie</li>
                <li>Plomorfismo: a mesma chamada a <b>getDescricao()</b> utiliza a implementação de cada classe</li>
            </ul>
        </div>

    </div>
</body>

</html>