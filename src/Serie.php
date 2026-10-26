<?php
// src/Serie.php

// Serie é uma subclasse que HERDA da superclasse Conteudo
class Serie extends Conteudo
{
    // 1) Adicione uma propriedade específica da Série: temporadas
    private int $temporadas;

    /* Mini-exercícios */

    // 2) Programe o uso dos construtores considerando superclasse e subclasse
    public function __construct(string $titulo, string $genero, int $ano, int $temporadas)
    {
        // Chama o construtor da superclasse/pai Conteudo e repassa os valores pra ela
        parent::__construct($titulo, $genero, $ano);

        // Atribui o valor à propriedade da subclasse/filha Serie
        $this->temporadas = $temporadas;
    }

    // 3) Faça getter/setter para esta propriedade (temporadas)
    public function getTemporadas(): int
    {
        return $this->temporadas;
    }

    public function setTemporadas(int $temporadas): void
    {
        $this->temporadas = $temporadas;
    }

    // 4) (na index.php) Crie dois objetos do tipo Serie 
    // 5) (na index.php) Mostre estes dois objetos usando var_dump    

    public function getDescricao(): string 
    {
        return "A série $this->titulo possui $this->temporadas temporadas.";
    }
}