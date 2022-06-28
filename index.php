<?php

session_start();
// PAGE TITLE
$page = 'index';

require_once __DIR__."/models/Book_model.php";
require_once __DIR__."/models/Model.php";

use models\Book_model\Book_model;

try {
    $mostProducts = Book_model::getSixRandomProducts();
} catch (\Throwable $th) {
    die("ERROR");
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-index.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";