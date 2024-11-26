<?php

class alugardao {
    // insert
    public function cadastrarAluguel(Alugar $a) {
        $sql = 'insert into alugar(qdt, id_livro) values (?, ?)';
        $bd = new conexao();
        $banco = $bd->getConexao();
        $values = $banco->prepare($sql);
        $values->bindValue(1, $a->getqdt());
        $values->bindValue(2, $a->getId_livro());

        $result = $values->execute();
        if($result) {
            header('Location: ../frontend/alugar.php');
        } else {
            header('Location: ../index.php');
        }
    }

    //select
    public function consultarAluguel() {
        $sql = 'select * from alugar';
        $bd = new conexao();
        $banco = $bd->getConexao();
        $values = $banco->prepare($sql);
        $values->execute();

        if($values->rowCount()>0) {
            $result = $values->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
    }

    //delete
    public function apagarAluguel(Alugar $a) {
        $sql = 'delete from alugar where id_alugar = ?';
        $bd = new conexao();
        $banco = $bd->getConexao();
        $values = $banco->prepare($sql);
        $values->bindValue(1, $a->getId_alugar());
        $result = $values->execute();

        if($result) {
            header('Location: ../frontend/alugar.php');
        } else {
            header('Location: ../index.php');
        }
    }
}

?>