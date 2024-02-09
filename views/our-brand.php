<?php include __DIR__ . '/../business/our-brand.response.php' ?>
<div class="row d-flex align-items-center">
    <?php foreach ($ourBrands as $brand): ?>
        <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/our-brands/<?php echo $brand['brand_image'] ?>" class="img-fluid"
                alt="<?php echo $brand['brand_title'] ?>">
        </div>
    <?php endforeach; ?>

</div>