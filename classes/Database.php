<?php

class Database{
    private function __construct() {}

    private static ?PDO $instance = null;
    public static function getConnection(): PDO{
        [
            'HOST' => $host,
            'PORT'=> $portName,
            'DB_NAME'=> $serverName,
            'CHARSET'=> $charset,
            'USER' => $dbuser,
            'PASSWORD'=> $dbpass,
        ] = parse_ini_file(__DIR__  . '/../Config/db.ini'); // lit les donnees de configuration externaliser de connexion a la BDD
        //var_dump($serverName, $portName, $serverName, $charset, $dbuser, $dbpass);
        $dsn = "mysql:dbname=$serverName;port=$portName;host=$host;charset=$charset";
        if (self::$instance === null) {
            self::$instance = new PDO($dsn, $dbuser, $dbpass);
        }
        return self::$instance;
    }
}   
                                                                          