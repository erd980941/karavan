<?php include __DIR__."/../business/mision-vision.response.php" ?>
<div class="row">
    <div class="col-lg-6 order-1 order-lg-2 position-relative" data-aos="fade-left">
        <img src="assets/img/<?php echo $mision['mv_image'] ?>" class="img-fluid" alt="">
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
        <?php echo $mision['mv_content'] ?>

    </div>

</div>
<div class="row mt-4">

    <div class="col-lg-6 order-2 order-lg-1 position-relative" data-aos="fade-right">
        <img src="assets/img/<?php echo $vision['mv_image'] ?>" class="img-fluid" alt="">
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content" data-aos="fade-left">
    <?php echo $vision['mv_content'] ?>

    </div>

</div>