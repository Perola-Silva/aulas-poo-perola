<?php
// src/Filme.php

class Filme 
{
    private string $titulo;
    private string $genero;
    private int $ano;

    public function ehClassico(): bool
    {
        return $this->ano < 2000;
    }

    /* Métodos getters: permitem ACESSO/LEITURA (ler dados)  */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getGenero(): string 
    {
        return $this->genero;
    }

    public function getAno(): int 
    {
        return $this->ano;
    }

    /* Métodos setters: permitem ACESSO/ESCRITA (colocar dados) */
    /* Setters recebem através de parametros os dados a serem colocoados nas propriedades */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    public function setAno(int $ano): void
    {
        $this->ano = $ano;
    }
}