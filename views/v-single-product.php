<main class=" pb-5 pt-5" style="background-image: url('./public/theme/img/Library.jpg' )">
    <div class="container  pb-5 pt-5">
        <h1 class="card-title mb-5 text-white"><?php echo htmlspecialchars($book->title); ?></h1>
        <div class="row mb-5">
            <div class="col-5">
                <img src="<?php echo "./".htmlspecialchars($book->img); ?> " class="card-img-top" alt="...">
            </div>
            <div class="col-7 text-white">                
                <p><?php echo "by: ". htmlspecialchars($book->author); ?></p>
                <p><?php echo htmlspecialchars($book->category); ?></p>
                <p><?php echo htmlspecialchars($book->description); ?></p>
                <p><?php echo "price: ". htmlspecialchars($book->price)."$"; ?></p>                
                <div class="card-body">


                <form action="./single-product.php?product=<?php echo htmlspecialchars($book->id)   ?>" method="post">
                    <div >
                       
                        <label for="quantity">Quantity: </label>                         
                        <input type="number"   name="quantity" value="1"  min="1">
                        
                    </div>
                    <?php if(!empty($systemErrors['quantity'])) { ?>
                    <div class="error-msg text-danger">
                        <?php echo htmlspecialchars($systemErrors['quantity']) ?>
                    </div>
                    <?php } ?>
                    <input hidden name="product_id" value="<?php echo htmlspecialchars($book->id); ?>">
                    <br>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>


                 
                <!-- <button form="add-to-cart-<?php echo htmlspecialchars($book->id); ?>" class="btn btn-primary">Add to Cart</button>
                        <form id="add-to-cart-<?php echo htmlspecialchars($book->id); ?>" action="./single-product.php?product=<?php echo htmlspecialchars($book->id)   ?>" method="post">
                        <label for="num">number of books: </label>                    
                        <input  type="number" name="quantity" value="1" min="1">    
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($book->id); ?>">
                        </form>




                    <form action="./shopping-cart-page.php" method="GET">
                        <label for="num">number of books: </label>                    
                        <input  type="number" name="quantity" value="1" min="1">
                        <input  type="hidden" name="product-id" value="<?php echo $book->id; ?>"></p> 
                        <button type="submit" class="btn btn-primary" >Add to Cart</button>                      
                    </form>                    -->
                    </div>  
                <br>
                <hr>
                <br>  
                <div class="card-body">               

                    <a href="./single-product.php?product=<?php echo htmlspecialchars($previousBook->id)?>" class="btn btn-success">PREVIOUS</a> 
                    <span><?php echo "<< \"".htmlspecialchars($book->title)."\" >>" ?></span>
                    <a href="./single-product.php?product=<?php echo htmlspecialchars($nextBook->id)?>" class="btn btn-success">NEXT</a>                    
                </div>
                <div class="card-body">
                                       
                </div>          
            </div>
        </div>
        <div class="row">
            <?php 
            foreach ($relatedBooks as $book) { ?>
            <div class="card col-4 mb-5" >
                    <img src="<?php echo "./".htmlspecialchars($book->img) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars($book->title) ?></h4>
                        <p class="card-text"> <?php echo htmlspecialchars($book->description) ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo htmlspecialchars( $book->category) ?></li>
                        <li class="list-group-item"><?php echo "by: ". htmlspecialchars($book->author) ?></li>
                        <li class="list-group-item"><?php echo "price: ".htmlspecialchars($book->price)."$" ?></li>                      
                        
                    </ul>
                    <div class="card-body">
                        <a href="./single-product.php?pg=<?php echo htmlspecialchars($book->id)?>" class="btn btn-success">SHOW</a>                    
                    </div>
                   
                </div>           
            <?php } ?>
        </div>
    </div>
</main>