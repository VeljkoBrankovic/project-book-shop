<?php
session_start();

// PAGE TITLE
$page = 'login-page';

require_once __DIR__."/models/User_model.php";

use models\User_model\User_model;

if (isset($_POST['log'])){
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email=$_POST['email'];}
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $pass=$_POST['password'];}
    $object=new User_model();
    $object->Login($email,$pass);
    echo $object->email;
    }






// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-login.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
