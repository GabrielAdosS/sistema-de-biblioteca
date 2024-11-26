<?php

class livrodao {
    public function consultarLivros() {
        $sql = 'select * from livro';
        $db = new conexao();
        $banco = $db->getConexao();
        $values = $banco->prepare($sql);
        $values->execute();

        if($values->rowCount()>0) {
            $result = $values->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
    }
}

?>