<main class=" pt-5" style="background-image: url('./public/theme/img/Library.jpg' ); ">

    <div class="container pb-5">
        <section class="mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./public/theme/img/carusel3.jpg" class="d-block w-100" alt="WALL">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/theme/img/carusel2.jpg" class="d-block w-100" alt="WALL">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/theme/img/carusel1.jpg" class="d-block w-100" alt="WALL">
                    </div>
                </div>
                <button class="carousel-control-prev "  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="my-5">
            <div class="mb-5">
                <h2 class="text-center text-white">Most popular product</h2>
            </div>
            <div class="row">
                <?php foreach ($mostProducts as $product) { ?>
                    <div class="col-2 p-2">
                        <a href="./single-product.php?product=<?php echo htmlspecialchars($product->id); ?>">
                            <div class="row " >
                                <img src="./<?php echo htmlspecialchars($product->img); ?>" class="col-12" alt="<?php echo htmlspecialchars($product->title); ?>">
                                
                            </div>
                        </a>
                        <div class="col-12 text-white">
                                    <h5 ><?php echo htmlspecialchars($product->title); ?></h5>
                                    
                                </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

</main>

