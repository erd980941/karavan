<?php include __DIR__.'/../business/about-us.response.php' ?>
<h1 class="k-h1">Elma Karavan</h1>
<div class="row mt-5 ">
    <div class="col-lg-7">
        <h4>
            <?php echo $aboutUs['about_title'] ?>
        </h4>
        <span class="lead ">
            <?php echo $aboutUs['about_content'] ?>
        </span>
    </div>
    <div class="col-lg-5">
        <div class="circle-div">
            <img src="assets/img/<?php echo $aboutUs['about_image'] ?>" class="img-fluid"
                alt="<?php echo $aboutUs['about_image_alt'] ?>">
        </div>
    </div>
</div>