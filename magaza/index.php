<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/index.response.php' ?>
<section class="k-slider container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'views/slider.php' ?>
        </div>
    </div>

</section>
<section class="container mt-5" id="home-products">
    <!-- <h2 class="h2-featured mb-4">En Son Eklenen Ürünler</h2> -->
    <div class="row">
        <div class="col-lg-3">
            <?php include 'views/sidebar.php' ?>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-12">
                    <?php include 'views/sorting-bar.php' ?>
                </div>
                <?php include 'views/last-added-products.php' ?>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row mt-5">
        <h2 class="h2-featured mb-4">En Çok Satanlar</h2>
        <div class="owl-carousel owl-theme">
            <?php include 'views/best-selling-products.php' ?>
        </div>
    </div>

</section>

<?php include 'views/footer.php' ?>