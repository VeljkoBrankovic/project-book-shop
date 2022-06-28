<?php
session_start();

// PAGE TITLE
$page = 'single-product';

require_once __DIR__."/models/Book_model.php";
//require_once __DIR__."/models/Model.php";
require_once __DIR__ . "/lib/ShoppingCart.php";
require_once __DIR__ . "/lib/ShoppingCartItem.php";

use models\Book_model\Book_model;
use lib\ShoppingCart\ShoppingCart;

$bookId = null;
$systemErrors = [];

if(!empty($_GET['product'])) {
    $bookId = $_GET['product'];
}

$book = Book_model::getOneBookById($bookId);
$relatedBooks = Book_model::getRelatedBooks($bookId);
$previousBook = Book_model::getPrevBook($bookId);
$nextBook = Book_model::getNextBook($bookId);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    if(isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0){
        if($shoppingCart->getOneItem($_POST['product_id'])!=null){
            $scItem=$shoppingCart->getOneItem($_POST['product_id']);
            $stockAvailable=$scItem->getProduct()->stock - $scItem->getQuantity();
            if($_POST['quantity']<=$stockAvailable) {
                $shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']), $_POST['quantity']);
            } else {
                $shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']), $stockAvailable);
            }
        } else {
            if($_POST['quantity']<=Book_model::getOneBookById($_POST['product_id'])->stock) {
                $shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']), $_POST['quantity']);
            } else {
                $shoppingCart->addToCart(Book_model::getOneBookById($_POST['product_id']), Book_model::getOneBookById($_POST['product_id'])->stock);
            }
        }

            $shoppingCart->updateSession();
        } else {
            $systemErrors['quantity'] = "Not valid Quantity";
        }
    }






// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-single-product.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";