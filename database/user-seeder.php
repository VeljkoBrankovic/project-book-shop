<?php

$all_users = [
        [
            'name'=>"Jovan",
            'last_name'=>"Jovanovic",
            'email'=>"jova@gmail.com",
            'password'=>"jova123",
            'age'=>35,
            'gender'=>"male"            
        ],
        [
            'name'=>"Mina",
            'last_name'=>"Petrovic",
            'email'=>"mina@gmail.com",
            'password'=>"mina123",
            'age'=>31,
            'gender'=>"female"            
        ]
    ];

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

    foreach ($all_users as $user) {
        $sqlQueryString = "INSERT INTO users (name, last_name, email, password, age, gender)"
                        . " VALUES (" . ":name" . ", " . ":last_name" . ", " . ":email" . ", " . ":password" . ", " . ":age" . ", " . ":gender" . ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'name' => $user["name"],
            'last_name' => $user["last_name"],
            'email' => $user["email"],
            'password' => $user["password"],
            'age' => $user["age"],
            'gender' => $user["gender"]            
        ];
        $status = $statement->execute($params);
    }
} catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}
    