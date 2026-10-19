<?php
// src/Filme.php

class Filme 
{
    private string $titulo;
    private string $genero;
    private int $ano;

    /* Método CONSTRUTOR: a finalidade deste método é receber dados (atraves de parametros) no momento da criação do objeto e atribui-los às propriedades. Este método NÃO possui retorno */
    public function __construct(string $titulo, string $genero, int $ano)
    {
        // Atribuindo os valores recebidos pelos parâmetros às propriedades
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
    }

    public function ehClassico(): bool
    {
        return $this->ano < 2000;
    }

    
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
        if($ano > 0){
            $this->ano = $ano;
        }
    }
}