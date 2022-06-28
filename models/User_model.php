<?php

namespace models\User_model;

include 'Model.php';

use models\Model\Model;

class User_model extends Model
{
    
    
    public $id;
    public $name;
    public $last_name;
    public $email;
    public $pass;
    public $age;    
    public $gender;

    private $db;
    

    public function __construct($user)
    {
        $this->id = $user['id'];
        $this->name = $user['name'];
        $this->last_name = $user['last_name'];        
        $this->email = $user['email'];  
        $this->password = $user['password'];           
        $this->age = $user['age'];        
        $this->gender = $user['gender'];
    }

    public function Login ($email,$pass){
        $db=parent::connect();
        if(!empty($email)&& !empty($pass)){
            $st=$this->db->prepare("SELECT * FROM users WHERE email=? and password=?");
            $st->bindParam(1,$email);
            $st->bindParam(2,$pass);
            $st->execute();
        }
        if(st->rowCount()==1){
            echo "logged in";
        } else {
            echo " not logged in";
        }
    }

    // public static function getAllBooks()
    // {
    //     parent::connection('products');
    //     $allProducts = [];
    //     if (self::$db_status) {
    //         foreach (parent::fetchAll() as $product) {
    //             $allProducts[] = new self($product);
    //         }
    //     }
    //     return $allProducts;
    // }
}