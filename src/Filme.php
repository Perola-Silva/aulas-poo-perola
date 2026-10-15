<?php
// src/Filme.php

class Filme 
{
    // Propriedades: Características
    public string $titulo;
    public string $genero;
    public int $ano;
    public string $direcao;

    // Métodos: Comportamentos (funções)
    public function ehClassico(): bool
    {
        // é classico se for menor que 2000
        return $this->ano < 2000;
    }
}