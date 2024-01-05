<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>

<section class="container mt-4" id="home-products">
<ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="urunler"><i class="fa-solid fa-boxes-stacked"></i> Ürünler</a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-lg-3">
            <?php include 'views/sidebar.php' ?>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="row">
                <div class="col-12">
                    <?php include 'views/sorting-bar.php' ?>
                </div>
                <?php include 'views/product.php' ?>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h2 class="h2-featured mb-4">En Çok Satanlar</h2>
        <div class="owl-carousel owl-theme">
            <?php include 'views/best-selling-products.php' ?>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>