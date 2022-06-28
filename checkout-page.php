<?php
session_start();

// PAGE TITLE
$page = 'checkout-page';

if(empty($_SESSION['cart'])) {
    header("Location: ./all-products-page.php");
}
require_once __DIR__."/models/Book_update.php";
require_once __DIR__."/models/Book_model.php";
require_once __DIR__."/models/Model.php";
require_once __DIR__ . "/lib/ShoppingCart.php";
require_once __DIR__ . "/lib/ShoppingCartItem.php";

use models\Book_model\Book_model;
use lib\ShoppingCart\ShoppingCart;

$systemErrors = [];

// if(!empty($_GET['pg'])) {
//     $bookId = $_GET['pg'];
// }
// $book = Book_model::getOneBookById($bookId);

// $qty = 1;

// if(!empty($_GET['num'])) {
//     $qty = $_GET['num'];
// }

try {
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    $items = $shoppingCart->getItems();
    // VALIDACIJA NARUCIVANJA
    if($_POST['buy'] == "yes") {
        // NAME
        $name = (string) $_POST['name'];
        $name = trim($name);
        if(empty($name)) {
            $systemErrors['name'] = "Field name is required!";
        }
        // LAST NAME
        $last_name = (string) $_POST['last_name'];
        $last_name = trim($last_name);
        if(empty($last_name)) {
            $systemErrors['last_name'] = "Field last name is required!";
        }
        // EMAIL
        $email = (string) $_POST['email'];
        $email = trim($email);
        if(empty($email)) {
            $systemErrors['email'] = "Field email is required!";
        }
        if(empty($systemErrors['email']) && !str_contains($email, "@")) {
            $systemErrors['email'] = "Mail must include @!";
        }
        // CITY
        $city = (string) $_POST['city'];
        $city = trim($city);
        if(empty($city)) {
            $systemErrors['city'] = "Field city is required!";
        }
        // PHONE
        $phone = (string) $_POST['phone'];
        $phone = trim($phone);
        if(empty($phone)) {
            $systemErrors['phone'] = "Field phone is required!";
        }
        if(empty($systemErrors['phone']) && false) {
            $systemErrors['phone'] = "Phone number is not valid!";
        }
        // STREET
        $street = (string) $_POST['street'];
        $street = trim($street);
        // ZIP
        $zip = (string) $_POST['zip'];
        $zip = trim($zip);
        if(empty($zip)) {
            $systemErrors['zip'] = "Field zip is required!";
        }
        // MESSAGE
        $message = (string) $_POST['message'];
        $message = trim($message);
        // RIGHTS
        $rights = (string) $_POST['rights'];
        if(empty($rights)) {
            $systemErrors['rights'] = "You must check your rights!";
        }
        if(empty($systemErrors)) {
            
           // echo($_POST['product_id']);
           // echo($_POST['quantity']);
        $forSetStock=$shoppingCart->getItems();
        foreach($forSetStock as $item){
            $stockAvailable=$item->getProduct()->stock - $item->getQuantity();
            $item->setQuantity($stockAvailable);
           }
        setStock($forSetStock);

          $_SESSION['cart'] = [];
         header('Location: ./thank-you-page.php');
        }
    }
} catch (\Throwable $th) {
    $_SESSION['cart'] = [];
    setStock($items);
    header("Location: ./");
}



// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-checkout.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";