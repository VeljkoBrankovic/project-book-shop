<?php
session_start();

// PAGE TITLE
$page = 'shoping-cart-page';

if(empty($_SESSION['cart'])) {
    header("Location: ./products.php");
}


require_once __DIR__ . "/models/Book_model.php";
require_once __DIR__ . "/lib/ShoppingCart.php";
require_once __DIR__ . "/lib/ShoppingCartItem.php";

// USING MODELS
use models\Book_model\Book_model;
use lib\ShoppingCart\ShoppingCart;

//try {
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    // REMOVE ITEMS
    if(!empty($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $productId) {
            $shoppingCart->removeProduct(Book_model::getOneBookById($productId));
           // $shoppingCart->updateSession();
            if(empty($_SESSION['cart'])) {
                header("Location: ./products.php");
            }
        }
    }
     
    $items = $shoppingCart->getItems();

     // UPDATE QUANTITY
     if(!empty($_POST['quantity'])){
    foreach ($items as $idBook=> $item) {
    //     $stockAvailable=$item->getProduct()->stock - $item->getQuantity();
    //     if($_POST['quantity'][idBook]<=$stockAvailable) {
    //         $shoppingCart->addToCart($item->getProduct(), $_POST['quantity'][idBook]);
    //     } else {
    //         $shoppingCart->addToCart($item->getProduct(), $stockAvailable);
    //     }
    // } else {
        if($_POST['quantity'][$idBook]<=$item->getProduct()->stock) {
            $shoppingCart->addToCart2(Book_model::getOneBookById($item->getProduct()->id), $_POST['quantity'][$idBook]);
        } else {
            $shoppingCart->addToCart2(Book_model::getOneBookById($item->getProduct()->id), $item->getProduct()->stock);
        }   
       // $item->setQuantity($_POST['quantity'][$idBook]);
    }}

    $shoppingCart->updateSession();

// } catch (\Throwable $th) {
//     header("Location: ./");
// }


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-shopping-cart-page.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";