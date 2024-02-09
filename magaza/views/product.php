
<?php foreach ($products as $key =>$product): ?>
<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 d-flex" data-aos="fade-down" data-aos-delay="<?php echo $key*500 ?>">
    <div class="card w-100 my-2 shadow-2-strong p-3">
        <img src="assets/img/products/<?php echo isset($product['photo_name']) ? $product['photo_name'] : 'no-image.jpg' ?>" class="card-img-top" alt="<?php echo $product['photo_name']?>">
        <div class="card-body d-flex flex-column p-0 pt-2 text-center">
            <h5 class="mt-3"><?php echo $product['product_name'] ?></h5>
            <span class="mt-4"><?php echo number_format($product['discounted_price'], 2, ',', '.') ?> TL</span>
            <s> <?php echo $product['discount_rate'] > 0 ? number_format($product['original_price'], 2, ',', '.') . ' TL' : '' ?></s>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                <a href="<?php echo url($product['product_name']) . "-" . $product['product_id'] ?>" class="btn  primary-button shadow-0 me-1 w-100 <?php echo !$loggedIn ? 'btn-block' : '' ?>">
                    <i class='bx bx-search-alt-2'></i> İncele
                </a>
                <?php if ($loggedIn): ?>
                    <form action="business/cart.request.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                        <button type="submit" name="addToCart" class="btn primary-button">
                            <i class='bx bxs-cart-add px-1'></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php if (empty($products)): ?>
    <div class="col-12">
        <b>Bu Kategoriye Ait Ürün Bulunmamaktadır.</b>
    </div>

<?php endif; ?>

<div class="row justify-content-center mt-4">
    <div class="col-auto">
        <?php include 'views/pagination.php' ?>
    </div>
</div>