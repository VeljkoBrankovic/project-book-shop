<?php
session_start();

// PAGE TITLE
$page = 'thank-you-page';

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-thank-you.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
