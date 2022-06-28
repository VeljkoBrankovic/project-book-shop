<?php
session_start();

// PAGE TITLE
$page = 'products';

require_once __DIR__."/models/Book_model.php";
require_once __DIR__ . "/lib/ShoppingCart.php";
require_once __DIR__ . "/lib/ShoppingCartItem.php";

use models\Book_model\Book_model;
use lib\ShoppingCart\ShoppingCart;
use lib\ShoppingCartItem\ShoppingCartItem;

 try {
$books=Book_model::getAvailableBooks();

$filter = "";
$sort="";

if(!empty($_GET['filter'])) {
    $filter = $_GET['filter'];
}

if($filter != "") {
    $books = Book_model::filteredBooks($filter);
}

if(!empty($_GET['sort-by'])) {
    $sort = $_GET['sort-by'];
}

if($sort != "") {
    $books = Book_model::sortedBooks($books,$sort);
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
if (isset($_POST['product_id']) && !empty($_POST['product_id'])){
    if($shoppingCart->getOneItem($_POST['product_id'])!=null){        
        $scItem=$shoppingCart->getOneItem($_POST['product_id']);        
        if($scItem->getProduct()->stock > $scItem->getQuantity()) {
            $shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']));
        }
        }  else {$shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']));}
        $shoppingCart->updateSession();
}




} catch (\Throwable $th){
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-products.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";