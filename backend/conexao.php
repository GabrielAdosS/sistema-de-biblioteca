<?php 

class conexao {
    private static $dns;

    public static function getConexao() {
        if(!isset(self::$dns)) {
            self::$dns = new PDO('mysql:host=localhost; dbname=', 'root', 'EliteBrazil00');
            return self::$dns;
        } else {
            return self::$dns;
        }
    } 
}
?>