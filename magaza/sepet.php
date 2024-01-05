<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/cart.response.php' ?>

<section class="container mt-4" id="home-products">
    <ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="sepet"><i class="fas fa-shopping-cart"></i> Sepetim</a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-12">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-lg-9">
                                        <h5 class="mb-3">
                                            <a href="urunler" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>
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
                                        <?php foreach ($cartData as $product): ?>
                                            <?php $totalPrice += ($product['discounted_price'] * $product['quantity']) ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="../assets/img/products/<?php echo $product['photo_name'] ?>"
                                                                    class="img-fluid rounded-3" alt="Shopping item"
                                                                    style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5><a
                                                                        href="<?php echo url($product['product_name']) . "-" . $product['product_id'] ?>">
                                                                        <?php echo $product['product_name'] ?>
                                                                    </a></h5>
                                                                <!-- <p class="small mb-0">256GB, Navy Blue</p> -->
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">
                                                                    <?php echo $product['quantity'] ?>
                                                                </h5>
                                                            </div>
                                                            <div style="width: 150px;">
                                                                <h5 class="mb-0">
                                                                    <?php echo number_format(($product['discounted_price'] * $product['quantity']), 2, ',', '.') ?>
                                                                    TL
                                                                </h5>
                                                            </div>
                                                            <form action="business/cart.request.php" method="POST">
                                                                <input type="hidden" name="cart_id"
                                                                    value="<?php echo $product['cart_id'] ?>">
                                                                <button type="submit" class="btn btn-sm btn-primary"
                                                                    style="color: #cecece;" name="delete_from_cart">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="col-lg-3">

                                        <div class="card bg-primary text-white rounded-3">
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
                                                            class="btn btn-info btn-block btn-lg">
                                                            <div class="d-flex justify-content-between">
                                                                <!-- <span>
                                                                    <?php echo number_format($totalPrice * 1.18, 2, ',', '.') ?>
                                                                    TL
                                                                </span> -->
                                                                <span>Sepeti Onayla <i
                                                                        class="fas fa-long-arrow-alt-right ms-2"></i></span>
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