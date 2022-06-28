<?php

namespace models\Model;

class Model
{
    protected static $hostname ="localhost"; // "127.0.0.1";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "books";
    protected static $connection;
    protected static $db_status;
    protected static $statement;

    protected static function connection($table)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "SELECT * FROM " . $table;
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute();
    }

    protected static function fetchAll()
    {
        $rows = self::$statement->fetchAll();
        $numberOfRows = count($rows);
        if ($numberOfRows > 0) {
            return $rows;
        }
        return null;
    }

    

    public function connect(){
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
        
        // $pdo=new \PDO($dsn, self::$username, self::$password);
        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return self::$connection;
    }

    
}