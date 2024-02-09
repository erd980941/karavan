<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'views/slider.php' ?>
<?php include 'business/index.response.php' ?>
<main id="main">
    <section id="last-added-products" class="featured-products pt-0">
        <div class="container" data-aos="zoom">
            <div class="section-title">
                <span>Son Eklenen Ürünler</span>
                <h2>Son Eklenen Ürünler</h2>
            </div>
            <div class="row">
                <?php include 'views/last-added-products.php' ?>
            </div>
        </div>
    </section>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="text-center">
                <h1>KATEGORİLER</h1>
            </div>
            <style>
                @-webkit-keyframes scroll {
                    0% {
                        transform: translateX(0);
                    }

                    50% {
                        transform: translateX(calc(-250px *
                                    <?php echo count($categoriesNav) ?>
                                ));
                    }
                }

                @keyframes scroll {
                    0% {
                        transform: translateX(0);
                    }

                    100% {
                        transform: translateX(calc(-250px *
                                    <?php echo count($categoriesNav) ?>
                                ));
                    }
                }

                .slider .slide-track {
                    width: calc(250px *
                            <?php echo count($categoriesNav) * 2 ?>
                        );
                }
            </style>
            <div class="slider">
                <div class="slide-track">
                    <?php foreach ($categoriesNav as $category): ?>
                        <div class="slide">
                            <button class="btn slide-category-btn w-100">
                                <?php echo $category['category_title'] ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach ($categoriesNav as $category): ?>
                        <div class="slide">
                            <button class="btn slide-category-btn w-100">
                                <?php echo $category['category_title'] ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
    </section>
    <!-- End Cta Section -->

    <section id="featured-products" class="featured-products">
        <div class="container" data-aos="zoom">
            <div class="section-title">
                <span>En Çok Satanlar</span>
                <h2>En Çok Satanlar</h2>
            </div>
            <div class="owl-carousel owl-theme">
                <?php include 'views/best-selling-products.php' ?>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">


            <?php include __DIR__.'/../views/contact.php' ?>

        </div>
    </section><!-- End Contact Section -->


</main><!-- End #main -->
<?php include 'views/footer.php' ?>