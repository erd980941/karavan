<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/category-product.response.php' ?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?= base_url ?>">Anasayfa</a></li>
            <li>
                <?php 
                    switch($category['category_type']){
                        case "tinyhouse":echo "Tiny House";break;
                        case "tinyticari":echo "Tiny Ticari";break;
                        case "karavan":echo "Karavan";break;
                        case "romork":echo "Römork";break;
                        case "marin":echo "Marin";break;
                    }
                ?>
            </li>
            <li><?php echo $category['category_name'] ?></li>
        </ol>
        <h2><?php echo $category['category_name'] ?></h2>

    </div>
</section>
    <!-- ======= Contact Section ======= -->
    <section id="products" class="inner-page" style="background:#f3f3f3;" >
        <div class="container">

            <div class="section-title">
                <span>Ürünlerimiz</span>
                <h2>Ürünlerimiz</h2>
                <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
            </div>

            <div class="row">
                <?php foreach($products as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                        <a href="<?=base_url?>/<?php echo $categoryType ?>/<?php echo $categoryUrl ?>/<?php echo $product['product_url'] ?>">
                            <div class="profile-card text-center">
                                <img src="<?=base_url?>/assets/img/products/<?php echo $product['photo_name'] ?>"
                                    class="img img-responsive img-fluid">
                                <div class="profile-content">
                                    <div class="profile-name"><?php echo $product['product_name'] ?></div>
                                    <div class="profile-description">
                                        <?php echo $product['product_short_description'] ?>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->
    <?php include 'views/footer.php' ?>