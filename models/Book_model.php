<?php

namespace models\Book_model;

include 'Model.php';

use models\Model\Model;

class Book_model extends Model
{
    const ORDER_BY_PRICE_ASC = "price-asc";
    const ORDER_BY_PRICE_DESC = "price-desc";
    
    public $id;
    public $title;
    public $author;
    public $description;
    public $stock;
    public $price;
    public $category;
    public $img;
    public $barcode;
    

    public function __construct($product)
    {
        $this->id = $product['id'];
        $this->title = $product['title'];
        $this->author = $product['author'];
        $this->category = $product['category'];
        $this->description = $product['description'];
        $this->img = $product['img'];        
        $this->price = $product['price'];
        $this->stock = $product['stock'];
        $this->barcode = $product['barcode'];
    }

    public static function getAllBooks()
    {
        parent::connection('products');
        $allProducts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $product) {
                $allProducts[] = new self($product);
            }
        }
        return $allProducts;
    }

    public static function setStock($id,$quantity){
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
        print_r($id);
        print_r($quantity);        
        $sql="UPDATE products SET stock =? WHERE id=?;";
        $stmt=$connection()->prepare($sql);
        $stmt->execute([$id,$quantity]);
    }

    public static function getAvailableBooks() {
       // $allBooks=self::getAllBooks();
        $availableBooks=[];
        foreach(self::getAllBooks() as $book){
            if($book->stock > 0){
                $availableBooks[]=$book;
            }
        }
        return $availableBooks;
    }

    public static function filteredBooks($term) {
        $filteredBooks = [];
        $books = self::getAvailableBooks();
        foreach($books as $book) {
            if(str_contains($book->title, $term)){
                $filteredBooks[] = $book;
            }
            else if(str_contains($book->author, $term)){
                $filteredBooks[] = $book;
            }
            else if(str_contains($book->description, $term)){
                $filteredBooks[] = $book;
            }
        }
        return $filteredBooks;
    }

    public static function sortedBooks($books,$sort) {

    $price= array_column($books,'price'); 
    
    if($sort==self::ORDER_BY_PRICE_ASC){
        array_multisort($price, SORT_ASC, SORT_NUMERIC, $books);  
    }
    if($sort==self::ORDER_BY_PRICE_DESC){
        array_multisort($price, SORT_DESC, SORT_NUMERIC, $books);  
    }
    return $books;
}

public static function getOneBookById($bookId){
    //$books= getAvailableBooks();
    foreach(self::getAvailableBooks() as $book){
        if($book->id==$bookId){
            return $book;
        }
    }
    
}

public static function getRelatedBooks($bookId){
    $related=[];
    $mainBook= self::getOneBookById($bookId);
    //$books=getAvailableBooks();
    foreach(self::getAvailableBooks() as $book){
        if($book->category == $mainBook->category&&$book->id!=$mainBook->id){
            $related[]=$book;
            if(count($related) >= 3) {
                break;
            }
        }
    }   
    
    return $related;
}

public static function getPrevBook($bookId){
    $books=self::getAvailableBooks();
    foreach($books as $key => $book){
        if($book->id==$bookId){
            if($key==0) return $books[count($books)-1];
            else  return $books[$key-1];
        }
    }

}

public static function getNextBook($bookId){
    $books=self::getAvailableBooks();
    foreach($books as $key => $book){
        if($book->id==$bookId){
            if($key==count($books)-1) return $books[0];
            return $books[$key+1];
        }
    }

}

public static function getSixRandomProducts()
    {
        $randProd = [];
        foreach (self::getAvailableBooks() as $product) {
            if (count($randProd) >= 6) {
                break;
            }
            $randProd[] = $product;
        }
        return $randProd;
    }

}