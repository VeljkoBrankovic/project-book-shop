<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/theme/css/bootstrap.css">
    <title>BOOK SHOP</title>
</head>

<body>
    <header style="position: fixed; top: 0; z-index: 1; width: 100%;">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid row " >
                <span class="navbar-brand text-light col-5" href="#">BOOK SHOP ONLINE</span>
                
                <div class="collapse navbar-collapse col-5" id="navbarNav" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php if($page == 'index') {
                                echo htmlspecialchars('active text-info');
                                } else {echo htmlspecialchars('text-light');}?> " aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($page == 'products') {
                                echo htmlspecialchars('active text-info');
                            } else {echo htmlspecialchars('text-light');}?> " aria-current="page" href="./products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($page == 'contact-us-page') {
                                echo htmlspecialchars('active text-info');
                            } else {echo htmlspecialchars('text-light');}?> " aria-current="page" href="./contact-us-page.php">Contact Us</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page == 'about-us-page') {
                                echo htmlspecialchars('active text-info');
                            } else {echo htmlspecialchars('text-light');}?> " aria-current="page" href="./about-us-page.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($page == 'login-page') {
                                echo htmlspecialchars('active text-info');
                            } else {echo htmlspecialchars('text-light');}?> " aria-current="page" href="./login-page.php">Login</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-brand text-light col-1">
                    <a class="nav-link position-relative" href="./shopping-cart-page.php">
                         <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <span class="position-absolute top-0 start-40 translate-middle badge rounded-pill bg-danger">
                            <?php 
                            if(!empty($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        
                        
                    </a>
                </div>
            </div>
        </nav>
<nav aria-label="breadcrumb"> 
   <ol class="breadcrumb">
   <?php if($page == 'index') {?>
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        <?php }
        if($page == 'products') {?>
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
            <?php }
        if($page == 'single-product') {?>
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Single Products</li>
            <?php }   
            
            
        if($page == 'page-not-found') {?>
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Page not found</li>
            <?php }   
            
            ?>                       
    
  </ol>
</nav>

</header>