<?php

class alugar {
    private $id_alugar, $qdt, $id_livro;

    public function getId_alugar() {
        return $this->id_alugar;
    }
    public function setId_alugar($id_alugar) {
        return $this->id_alugar = $id_alugar;
    }

    public function getqdt() {
        return $this->qdt;
    }
    public function setqdt($qdt) {
        return $this->qdt = $qdt;
    }

    public function getId_livro() {
        return $this->id_livro;
    }
    public function setId_livro($id_livro) {
        return $this->id_livro = $id_livro;
    }
}

?>