<?php

/**
 * Classe para controle do banco de dados
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */
class Mysql
{
    private static $pdo;

    public static function connect()
    {
        if (self::$pdo == null) {
            //Caso ainda não tenha sido instanciada
            try {
                self::$pdo = new PDO(DSN . DBNAME, USERDB, PASSDB, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                // Algo de errado aconteceu
                echo '<h2>Erro ao conectar</h2>';
            }
        }
        return self::$pdo;
    } //Fim do connect
}//fim Mysql
