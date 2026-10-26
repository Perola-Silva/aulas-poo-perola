<?php
// src/Filme.php

// Filme é uma subclasse que HERDA da superclasse Conteudo
class Filme extends Conteudo
{  
    // Propriedade específica da classe Filme
    private int $duracao;

    /* Método construtor específico da subclasse Filme
    Responsável por receber os valores no momento da criação de objeto Filme (incluindo a duração) */
    public function __construct(string $titulo, string $genero, int $ano, int $duracao)
    {
        /* Chamamos o construtor da superclasse (classe pai) usando
        parent::__construct(). Isso é necessário pois estes valores
        pertecem às propriedades da classe pai. */
        parent::__construct($titulo, $genero, $ano);

        // Já quanto à duração, fazemos a atribuição aqui mesmo (afinal, $duração é de Filme)
        $this->duracao = $duracao;
    }

    public function getDescricao(): string 
    {
        return "O filme $this->titulo possui $this->duracao minutos de duração.";
    }

}




