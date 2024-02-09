<?php include __DIR__ . '/../business/about-us.response.php' ?>

<div class="section-title">
    <span>Hakkımızda</span>
    <h2>Hakkımızda</h2>
    <p>Hakkımızda Bilgi sahibi olun..</p>
</div>

<div class="row">
    <div class="clearfix" data-aos="zoom-in" >
        <img src="assets/img/<?php echo $aboutUs['about_image'] ?>" class="col-md-6 float-md-end mb-3 ms-md-3 img-fluid"
            alt="<?php echo $aboutUs['about_image_alt'] ?>" data-aos="zoom-left">

            <h3>
                <?php echo $aboutUs['about_title'] ?>
            </h3>
            <?php echo $modifiedContent ?>

    </div>
</div>