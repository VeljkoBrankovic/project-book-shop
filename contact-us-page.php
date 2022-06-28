<?php
session_start();

// PAGE TITLE
$page = 'contact-us-page';

require_once __DIR__."/models/Contact_model.php";

$systemErrors = [];


if ($_POST['send'] == "yes") {
    $name = (string) $_POST['name'];
        $name = trim($name);
        // if(empty($name)) {
        //     $systemErrors['name'] = "Field name is required!";
        // }        
    // EMAIL
    $email = (string) $_POST['email'];
    $email = trim($email);
    // if(empty($email)) {
    //     $systemErrors['email'] = "Field email is required!";
    // }
    // if(empty($systemErrors['email']) && !str_contains($email, "@")) {
    //     $systemErrors['email'] = "Mail must include @!";
    // }
    // MESSAGE
    $message = (string) $_POST['message'];
    $message = trim($message);
    // if(empty($message)) {
    //     $systemErrors['message'] = "Fieldmessage is required!";
    // }

addContactMessage($name,$email,$message);
}
// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-contact-us.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
