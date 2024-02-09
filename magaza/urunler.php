<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include __DIR__ . '/business/product.response.php'; ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li>Ürünler</li>
        </ol>
        <h2>Ürünler</h2>

    </div>
</section>

<section id="products" class="products">
    <div class="container" data-aos="zoom-in">
        <div class="row"   >
            <div class="col-lg-3">
                <?php include 'views/sidebar.php' ?>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <?php include 'views/sorting-bar.php' ?>
                    </div>
                    <?php include 'views/product.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'views/footer.php' ?>