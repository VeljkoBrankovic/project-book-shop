<?php

/* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "books";

function addContactMessage($name, $email,$message){
   /* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "books";

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlQueryString = "INSERT INTO contacts ($name, $email, $message)"
                        . " VALUES (" . ":name" . ", " . ":email" . ", " . ":message" . ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'name' => $name,            
            'email' => $email,
            'message' => $message                      
        ];
        $status = $statement->execute($params);
    }
 catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}
}
    