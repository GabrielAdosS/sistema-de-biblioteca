<?php 

class conexao {
    private static $dns;

    public static function getConexao() {
        if(!isset(self::$dns)) {
            self::$dns = new PDO('mysql:host=localhost; dbname=alexandria', 'root', '');
            return self::$dns;
        } else {
            return self::$dns;
        }
    } 
}
?>
