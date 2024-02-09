<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/cart.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilgilerim">Profil</a></li>
            <li>Sepetim</li>
        </ol>
        <h2>Sepetim</h2>

    </div>
</section>
<section class="container" id="basket">

    <div class="row ">
        <div class="col-12" data-aos="zoom-in">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-lg-9">
                                        <h5 class="mb-3">
                                            <a href="urunler" class="text-body back-shop"  >
                                            <i class='bx bxs-left-arrow-square me-2' ></i>
                                                Alışverişe Devam Et
                                            </a>
                                        </h5>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-0">Sepetenizde toplam ürün
                                                    <?php echo count($cartData) ?> bulunmaktadır.
                                                </p>
                                            </div>
                                        </div>
                                        <?php foreach ($cartData as $key=>$product): ?>
                                            <?php $totalPrice += ($product['discounted_price'] * $product['quantity']) ?>
                                            <div class="card mb-3" data-aos="fade-up" data-os-delay="<?php $key*400 ?>" >
                                                <div class="card-body p-3 p-md-4 p-sm-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="assets/img/products/<?php echo $product['photo_name'] ?>"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 85px;">
                                                        </div>
                                                        <div class="col">
                                                            <div class="row justify-content-lg-between justify-content-end">
                                                                <div class="col-auto text-md-start text-center">
                                                                    <h5 style="margin-bottom:0">
                                                                        <a href="ihpone-15-8">
                                                                            <?php echo $product['product_name'] ?>
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="row align-items-center justify-content-end">
                                                                        <div class="col-auto">
                                                                            <?php echo $product['quantity'] ?>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                        <?php echo number_format(($product['discounted_price'] * $product['quantity']), 2, ',', '.') ?> TL
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <form action="business/cart.request.php"
                                                                                method="POST">
                                                                                <input type="hidden" name="cart_id"
                                                                                    value="<?php echo $product['cart_id'] ?>">
                                                                                <button type="submit"
                                                                                    class="btn btn-sm trash-button "
                                                                                    style="color: #cecece;"
                                                                                    name="delete_from_cart">
                                                                                    <i class='bx bxs-trash'></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="col-lg-3">

                                        <div class="card basket-total-card text-white rounded-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0">Sepetim</h5>

                                                </div>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Ara Toplam</p>
                                                    <p class="mb-2">
                                                        <?php echo number_format($totalPrice, 2, ',', '.') ?> TL
                                                    </p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">KDV </p>
                                                    <p class="mb-2">
                                                        <?php echo number_format($totalPrice * 0.18, 2, ',', '.') ?> TL
                                                    </p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Toplam</p>
                                                    <p class="mb-2">
                                                        <?php echo number_format($totalPrice * 1.18, 2, ',', '.') ?> TL
                                                    </p>
                                                </div>

                                                <?php if (!empty($cartData)): ?>
                                                    <form action="business/cart.request.php" method="POST">
                                                        <button type="submit" name="cart_approval"
                                                            class="btn w-100 basket-approve-btn btn-lg">
                                                            <div class="d-flex justify-content-center">
                                                                <!-- <span>
                                                                    <?php echo number_format($totalPrice * 1.18, 2, ',', '.') ?>
                                                                    TL
                                                                </span> -->
                                                                <span>
                                                                    Sepeti Onayla 
                                                                    <i class="fas fa-long-arrow-alt-right ms-2"></i>
                                                                </span>
                                                            </div>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>