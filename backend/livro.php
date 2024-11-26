<?php

class livro {
    private $id, $nome, $editora, $autor, $qdt;

    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getEditora() {
        return $this->editora;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function getQdt() {
        return $this->qdt;
    }
}

?>