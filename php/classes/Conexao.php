<?php
/**
 * Description of Conexao1
 *
 * @author Osvaldo
 */
define('HOST', 'sql208.epizy.com');
define('USER', 'epiz_23213938');
define('PASS', '8PiJHPrk3qrRTZ');
define('BD', 'epiz_23213938_foods');

class Conexao {

    private static $conexao;
            
    public static function conecta_pdo() {
        $dss = "mysql:host=" . HOST . ";dbname=" . BD;
        try {
            if (!isset(self::$conexao)):
                self::$conexao = new PDO($dss, USER, PASS);
            endif;

        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco".$e->getMessage();
        }
        return self::$conexao;
    }
}