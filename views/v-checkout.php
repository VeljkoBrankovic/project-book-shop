<main class=" pb-5 pt-5" style="background-image: url('./public/theme/img/Library.jpg' )">
    <div class="container pb-5">

          <div class="row">
            <div class="col-6 mb-5">
                <form class="p-4" action="./checkout-page.php" method="post" style="border: solid black 2px; border-radius: 2%;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" >
                        <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Enter last name" name="last_name" >
                        <?php if (!empty($systemErrors['last_name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" >
                                <?php if (!empty($systemErrors['city'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['city']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" min="100000000" max="99999999999" placeholder="Enter phone" name="phone" >
                                <?php if (!empty($systemErrors['phone'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['phone']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="street">Street & number</label>
                                <input type="text" class="form-control" id="street" placeholder="Enter street & number" name="street" >
                                <?php if (!empty($systemErrors['street'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['street']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="Enter zip" name="zip" >
                                <?php if (!empty($systemErrors['zip'])) { ?>
                                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['zip']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" placeholder="Comment" name="message"></textarea>
                        <?php if (!empty($systemErrors['message'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-check mb-5">
                        <input type="checkbox" name="rights" value="success" class="form-check-input" id="rights" >
                        <label class="form-check-label text-white" for="rights">Do you know your rights?</label>
                        <?php if (!empty($systemErrors['rights'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['rights']); ?></small>
                        <?php } ?>
                    </div>
                   
                    <button type="submit" class="btn btn-success mt-5 mb-5" name="buy" value="yes">Buy</button>
                
                </form>
            </div>
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        <span>Shopping Cart</span>
                    </div>
                    <div class="card-body">
                        <?php $total = 0; ?>
                        <?php foreach ($items as $item) { ?>
                            <?php
                                $subtotal = $item->getSubtotal();
                                $total += $subtotal;
                                ?>
                            <div class="item-container row">
                                <div class="col-4">
                                    <img width="100px" height="120px" src="./<?php echo htmlspecialchars($item->getProduct()->img); ?>" alt="Card image cap">
                                </div>
                                <div class="col-8">
                                    <h4 class="card-title"><?php echo htmlspecialchars($item->getProduct()->title); ?></h4>
                                    <p class="text-danger">Price: <?php echo htmlspecialchars($item->getProduct()->price); ?> $</p>
                                    <p class="text-danger">Quantity: <?php echo htmlspecialchars($item->getQuantity()); ?></p>
                                    <p class="text-danger">Price with quantity: <?php echo htmlspecialchars($subtotal); ?> $</p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <hr class="mb-3">
                <div class="d-flex justify-content-between">
                    <h2 class="text-warning">TOTAL:</h2>
                    <h2 class="text-danger"><?php echo htmlspecialchars($total); ?> $</h2>
                </div>
            </div>
        </div>
  




        <!-- <form class="row" action="message-page.php" method="GET">
            <div class="col-5">
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter city" required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input type="number" class="form-control" name="zip" min="0" placeholder="Enter zip" required>
                </div>
                <div class="form-group">
                    <label for="street">Address:</label>
                    <input type="text" class="form-control" name="street" placeholder="Enter street and number" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="number" class="form-control" name="phone" min="100000000" max="99999999999" placeholder="Enter phone number" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label> <br>
                    <textarea class="form-control" name="comment" rows="4"  placeholder="Enter your comment"></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="check1" required>
                    <label class="form-check-label" for="check1">Check me out</label>
                </div>
                <button type="submit" name="Send" id="Send"class="btn btn-primary">BUY</button>
            </div>
            <div class="col-4">

            <div class="card mb-5" >
                    <img src="<?php echo "./".htmlspecialchars($book->img) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars($book->title) ?></h4>                        
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo "Price: ".htmlspecialchars($book->price)."$" ?></li>                        
                        <li class="list-group-item"><?php echo "Quantity: ".$qty ?></li>
                        <li class="list-group-item"><?php echo "Price with qty: ". $book->price*$qty."$" ?></li>
                        <li class="list-group-item"><?php echo "Total: ". $book->price*$qty."$" ?></li>
                                              
                        
                    </ul>  
                    <input  type="hidden" name="title" value="<?php echo $book->title; ?>"></p> 
                    <input  type="hidden" name="price" value="<?php echo $book->price; ?>"></p>  
                    <input  type="hidden" name="qty" value="<?php echo $qty; ?>"></p>                  
                </div>  
                
            </div>
            
        </form> -->
    </div>
</main>