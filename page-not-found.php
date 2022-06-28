<?php
session_start();
$page ='page-not-found';

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-page-not-found.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
