<?php foreach ($lastAddedProducts as $product): ?>
    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong p-3">
            <?php if ($product['product_promotion']): ?>
                <div class="discount-badge bg-primary align-items-center">
                    <span>İndirim</span>
                </div>
            <?php endif; ?>
            <img src="../assets/img/products/<?php echo isset($product['photo_name']) ? $product['photo_name'] : 'no-image.jpg' ?>"
                class="card-img-top" alt="Fissure in Sandstone" />
            <div class="card-body d-flex flex-column p-0 pt-2 text-center">
                <h6>
                    <?php echo $product['product_name'] ?>
                </h6>
                <p class="card-text">
                    <h5><?php echo $product['discounted_price'] ?> TL</h5>
                    <s style="font-size:14px;color:#00000075">
                        <?php echo $product['discount_rate'] > 0 ? $product['original_price'] . ' TL' : '' ?>
                    </s>
                </p>
                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                    <a href="<?php echo url($product['product_name']) . "-" . $product['product_id'] ?>"
                        class="btn btn-primary shadow-0 me-1 w-100 <?php echo !$loggedIn ? 'btn-block' : '' ?>"><i
                            class="fa-solid fa-magnifying-glass"></i> İncele</a>
                    <?php if ($loggedIn): ?>
                        <form action="business/cart.request.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                            <button type="submit" name="addToCart" class="btn btn-light border px-2 pt-2 icon-hover">
                                <i class="fa-solid  fa-basket-shopping  text-secondary px-1"></i>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>