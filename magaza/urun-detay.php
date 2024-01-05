<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/product-detail.php' ?>

<section class="container mt-4" id="home-products">
    
    <ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="urunler"><i class="fa-solid fa-boxes-stacked"></i> Ürünler</a></li>
        <li><a href=""><i class="fa-solid fa-box"></i> <?php echo $product['product_name'] ?></a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-lg-4 mb-3">
            <div class="product-details">
                <div class="product-main-image mb-1">
                    <?php foreach ($productPhotos as $photo): ?>
                        <?php if ($photo['photo_id'] == $product['main_photo_id']): ?>
                            <img src="../assets/img/products/<?php echo $photo['photo_name'] ?>"
                                alt="<?php echo $product['product_name'] ?>"
                                data-image="../assets/img/products/<?php echo $photo['photo_name'] ?>" id="main-image">
                        <?php endif; ?>

                    <?php endforeach; ?>
                    <?php if (!isset($product['main_photo_id'])): ?>
                        <img src="../assets/img/products/<?php echo isset($productPhotos[0]['photo_name']) ? $productPhotos[0]['photo_name'] : 'no-image.jpg' ?>"
                            alt="no image" id="main-image">
                    <?php endif; ?>
                </div>
                <div class="product-images">
                    <?php foreach ($productPhotos as $photo): ?>
                        <div class="thumbnail">
                            <img src="../assets/img/products/<?php echo $photo['photo_name'] ?>"
                                alt="<?php echo $product['product_name'] ?>"
                                data-image="../assets/img/products/<?php echo $photo['photo_name'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-3">
            <div class="ps-lg-5">
                <h1 class="product-detail-name">
                    <?php echo $product['product_name'] ?>
                </h1>
                <hr>
                <p>
                    <?php echo $product['product_description'] ?>.
                </p>
                <div class="my-4">
                    <span class="product-detail-price">
                        <?php echo $product['discounted_price'] ?> TL
                    </span> <s>
                        <?php echo $product['discount_rate'] > 0 ? $product['original_price'] . ' TL' : '' ?>
                    </s>
                </div>
                <h4 class="product-detail-stock mb-3"><b>STOK :
                        <?php echo $product['product_quantity'] ?>
                    </b></h4>
                <form action="business/cart.request.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                    <div class="mb-3" style="width:150px">
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" id="decreaseBtn">-</button>
                            <input style="width:50px" type="text" class="quantity-input" name="quantity" max="10"
                                min="1" id="numberInput" value="1">
                            <button class="btn btn-outline-secondary" type="button" id="increaseBtn">+</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?php if ($loggedIn): ?>
                            <button type="submit" name="addToCart" class="btn btn-primary"><i
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

                <span class="p-2 bg-success text-white border-radius urun-cargo-info"><i class="fa-solid fa-truck"></i>
                    Ücretsiz Kargo</span>
                <hr>
                <b>Kategoriler:</b> <a href="#">Kategori 1</a> <a href="#">Kategori 2</a>
            </div>

        </div>
        <div class="col-lg-12 mt-5">
            <h2>Ürün Detay</h2>
            <hr>
            <div>
                <?php echo $product['product_detail'] ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.thumbnail img').on('click', function () {
            var newSrc = $(this).data('image');
            $('#main-image').attr('src', newSrc);
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const numberInput = document.getElementById('numberInput');
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');

        numberInput.addEventListener('input', () => {
            let currentValue = parseInt(numberInput.value);
            if (currentValue === 0) {
                decreaseBtn.classList.add('disabled');
                increaseBtn.classList.remove('disabled');
            } else if (currentValue === 100) {
                increaseBtn.classList.add('disabled');
                decreaseBtn.classList.remove('disabled');
            } else {
                decreaseBtn.classList.remove('disabled');
                increaseBtn.classList.remove('disabled');
            }
        });

        decreaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(numberInput.value);
            if (currentValue > 0) {
                currentValue -= 1;
                numberInput.value = currentValue;
                if (currentValue === 1) {
                    decreaseBtn.classList.add('disabled');
                }
                if (currentValue < 100) {
                    increaseBtn.classList.remove('disabled');
                }
            }
        });

        increaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(numberInput.value);
            currentValue += 1;
            numberInput.value = currentValue;
            if (currentValue > 1) {
                decreaseBtn.classList.remove('disabled');
            }
            if (currentValue === 100) {
                increaseBtn.classList.add('disabled');
            }
        });

        // Initial button states based on input value
        const initialValue = parseInt(numberInput.value);
        if (initialValue === 1) {
            decreaseBtn.classList.add('disabled');
        } else if (initialValue === 100) {
            increaseBtn.classList.add('disabled');
        }
    });
</script>
<?php include 'views/footer.php' ?>