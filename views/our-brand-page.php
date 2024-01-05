<?php include __DIR__.'/../business/our-brand.response.php' ?>
<h1 class="k-h1">Markalarımız</h1>
<div class="owl-carousel owl-theme mt-5">
    <?php foreach($ourBrands as $brand): ?>
        <div class="item">
            <img src="assets/img/our-brands/<?php echo $brand['brand_image'] ?>" class="img-fluid" alt="<?php echo $brand['brand_title'] ?>">
        </div>
    <?php endforeach; ?>
</div>
