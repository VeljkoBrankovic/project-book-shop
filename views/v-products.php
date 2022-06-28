<main class=" pb-5 pt-5" style="background-image: url('./public/theme/img/Library.jpg' )">
    <div class="container pb-5 pt-5" >
        <form class="row mb-5" action="./products.php" method="get">
        <select name="sort-by" id="sort-by" class="col-3">
                <option value="">None</option>
                <option value="price-asc">By price asc</option>
                <option value="price-desc">By price desc</option>
            </select>
            <input class="col-7" type="text" name="filter">
            <button type="submit" class="btn btn-danger col-2">Search</button>
        </form>
        <div class="row">
            <?php foreach ($books as $book){?>
                <div class="card col-4 mb-5 p-5" >
                    <img src="<?php echo "./".htmlspecialchars($book->img) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars($book->title) ?></h4>
                        <p class="card-text"> <?php echo htmlspecialchars($book->description) ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo htmlspecialchars($book->category) ?></li>
                        <li class="list-group-item"><?php echo "by: ". htmlspecialchars($book->author) ?></li>
                        <li class="list-group-item"><?php echo "price: ".htmlspecialchars($book->price)."$" ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="./single-product.php?product=<?php echo htmlspecialchars($book->id)   ?>" class="btn btn-success">SHOW</a>  
                        <button form="add-to-cart-<?php echo htmlspecialchars($book->id); ?>" class="btn btn-primary">Add to Cart</button>
                        <form id="add-to-cart-<?php echo htmlspecialchars($book->id); ?>" action="./products.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($book->id); ?>">
                        </form>                  
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>