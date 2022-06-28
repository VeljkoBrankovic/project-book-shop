<?php



function setStock($items){

    /* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "books";
   
    $connection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach($items as $item){
        
        $sql="UPDATE products SET stock =? WHERE id=?";  
        $stmt=$connection->prepare($sql); 
        $id=$item->getProduct()->id;
        $qty=$item->getQuantity();
        $stmt->bindParam(1,$qty);
        $stmt->bindParam(2,$id);
        $stmt->execute();
    }      
    
 }


