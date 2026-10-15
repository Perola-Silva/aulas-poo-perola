<?php 
require_once "src/Filme.php";

// Criando um OBJETO ou uma INSTÂNCIA a partir da classe Filme
$filme1 = new Filme();
$filme1->titulo = "De volta para o futuro";
$filme1->ano = 1984;
$filme1->genero = "Ficção Científica";

$filme2 = new Filme();
$filme2->titulo = "Toy Story";
$filme2->ano = 1995;
$filme2->genero = "Animação";

$filme3 = new Filme();
$filme3->titulo = "O Auto da Compadecida";
$filme3->ano = 2000;
$filme3->genero = "Comédia";

$filmes = [$filme1, $filme2, $filme3];
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
                <span class="genero"><?= $filme->genero ?></span>
                <h2><?= $filme->titulo ?></h2>
                <p class="ano"><?= $filme->ano ?></p>

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
                <li>Classes e Objetos</li>
                <li>Propriedades e métodos</li>
                <li>Tipos de dados</li>
                <li>Uso de <code>$this</code> para acessar recursos de dentro da propria classe</li>
            </ul>
        </div>

    </div>
</body>

</html>