<div class="k-side-bar bg-light p-3" data-aos="fade-right" data-aos-delay="300">
    <h4 class="text-center">Kategoriler</h4>
    <?php include __DIR__ . '/category-sidebar.php' ?>
    <hr>
    <h4 class="text-center">Fiyat Aralığı</h4>
    <div class="range_container mt-4">
        <form id="filterPrice" method="get" action="urunler">
            <div class="sliders_control">
                <input id="fromSlider" type="range"
                    value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : '0' ?>" min="0" max="100000" />
                <input id="toSlider" type="range"
                    value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '100000' ?>" min="0"
                    max="100000" />
            </div>

            <div class="form_control">
                <input type="text" class="mt-4" id="fromInput" name="min_price"
                    value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : '0' ?>" min="0" max="100000" />
                <input type="text" style="text-align:end" class="mt-4" id="toInput" name="max_price"
                    value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '100000' ?>" min="0"
                    max="100000" />
            </div>
            <button type="submit" class="btn  mt-3 primary-button w-100 sidebar-btn ">
                Filtrele
            </button>
        </form>
    </div>
    <hr>
    <h3 class="aside-title text-center">En Çok Satanlar</h3>
    <?php foreach ($productsFeatured as $product): ?>
        <div class="product-widget">
            <div class="product-img">
                <img src="assets/img/products/<?php echo $product['photo_name'] ?>" alt="">
            </div>
            <div class="product-body">
                <p class="product-category"><?php echo $product['category_title'] ?></p>
                <h3 class="product-name"><a href="<?php echo url($product['product_name']) . "-" . $product['product_id'] ?>"><?php echo $product['product_name'] ?></a></h3>
                <h4 class="product-price"><?php echo number_format($product['discounted_price'], 2, ',', '.') ?> TL <del class="product-old-price"><?php echo  $product['discount_rate'] > 0 ? number_format($product['original_price'], 2, ',', '.')  . ' TL' : '' ?></del></h4>
            </div>
        </div>
    <?php endforeach; ?>


</div>
