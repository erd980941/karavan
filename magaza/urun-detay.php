<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/product-detail.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./urunler">Kategoriler</a></li>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="urunler?category_id=<?php echo $category['category_id'] ?>">
                        <?php echo $category['category_title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li>
                <?php echo $product['product_name'] ?>
            </li>
        </ol>
        <h2>
            <?php echo $product['product_name'] ?>
        </h2>

    </div>
</section>
<section class="container" id="product-detail">
    <div class="row">
        <div class="col-lg-5 mb-3" data-aos="fade-right">
            <div class="product-details">
                <div class="product-main-image mb-3">
                    <?php foreach ($productPhotos as $photo): ?>
                        <?php if ($photo['photo_id'] == $product['main_photo_id']): ?>
                            <img src="assets/img/products/<?php echo $photo['photo_name'] ?>"
                                alt="<?php echo $product['product_name'] ?>"
                                data-image="assets/img/products/<?php echo $photo['photo_name'] ?>" id="main-image">
                        <?php endif; ?>

                    <?php endforeach; ?>
                    <?php if (!isset($product['main_photo_id'])): ?>
                        <img src="assets/img/products/<?php echo isset($productPhotos[0]['photo_name']) ? $productPhotos[0]['photo_name'] : 'no-image.jpg' ?>"
                            alt="no image" id="main-image">
                    <?php endif; ?>
                </div>
                <div class="product-images">
                    <?php foreach ($productPhotos as $photo): ?>
                        <div class="thumbnail">
                            <img src="assets/img/products/<?php echo $photo['photo_name'] ?>"
                                alt="<?php echo $product['product_name'] ?>"
                                data-image="assets/img/products/<?php echo $photo['photo_name'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-7 mb-3">
            <div class="ps-lg-5">
                <h1 class="product-detail-name" data-aos="fade-left" data-aos-delay="200">
                    <?php echo $product['product_name'] ?>
                </h1>
                <p data-aos="fade-left" data-aos-delay="400">
                    <?php echo $product['product_description'] ?>.
                </p>
                <div class="my-4" data-aos="fade-left" data-aos-delay="600">
                    <span class="product-detail-price">
                        <?php echo number_format($product['discounted_price'], 2, ',', '.') ?> TL
                    </span> <s>
                        <?php echo $product['discount_rate'] > 0 ? number_format($product['original_price'], 2, ',', '.') . ' TL' : '' ?>
                    </s>
                </div>
                <h4 class="product-detail-stock mb-3" data-aos="fade-left" data-aos-delay="800">STOK :<b>
                        <?php echo $product['product_quantity'] ?>
                    </b></h4>
                <form class="mb-5" action="business/cart.request.php" method="POST" data-aos="fade-left"
                    data-aos-delay="1000">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                    <div class="mb-3" style="width:150px">
                        <div class="input-group">
                            <button class="btn primary-button" type="button" id="decreaseBtn">-</button>
                            <input style="width:50px" type="text" class="quantity-input" name="quantity" max="10"
                                min="1" id="numberInput" value="1">
                            <button class="btn primary-button" type="button" id="increaseBtn">+</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?php if ($loggedIn): ?>
                            <button type="submit" name="addToCart" class="btn primary-button-2"><i
                                    class="fa-solid fa-basket-shopping"></i> Sepete Ekle</button>
                        <?php else: ?>
                            <p>Ürünü Sepete Eklemek İçin Lütfen <a href="giris-yap"
                                    style="text-decoration:underline"><b>Buraya</b></a> Tıklayarak Giriş Yapın. Kayıt Olmak
                                İçin <a href="giris-yap" style="text-decoration:underline"><b>Kayıt Ol</b></a> Buttonuna
                                Tıklayınız.
                            </p>
                        <?php endif; ?>
                    </div>
                </form>

                <span class="p-2 bg-success text-white border-radius urun-cargo-info" data-aos="fade-left"
                    data-aos-delay="1200"><i class="fa-solid fa-truck"></i>
                    Ücretsiz Kargo
                </span>
                <hr>
                <div data-aos="fade-left" data-aos-delay="1400">
                    <b>Kategoriler:</b>
                    <?php foreach ($categories as $category): ?>
                        <a href="urunler?category_id=<?php echo $category['category_id'] ?>">
                            <?php echo $category['category_title'] ?>
                        </a> /
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div class="col-lg-12" data-aos="fade-in">
            <div class="section-title product-detail-h2">
                <span>Detay</span>
                <h2>Detay</h2>
            </div>
            <div class="product-detail-long">
                <?php echo $product['product_detail'] ?>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="section-title product-detail-h2">
            <span>Öne Çıkarılanlar</span>
            <h2>Öne Çıkarılanlar</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <?php include 'views/best-selling-products.php' ?>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>