<?php include __DIR__.'/../business/mision-vision.response.php' ?>
<h1 class="k-h1" style="margin-bottom:5rem">Misyonumuz ve Vizyonumuz</h1>
<div class="row mt-5 ">
    <div class="col-md-6 ">
        <img src="assets/img/<?php echo $mision['mv_image'] ?>" class="img-fluid" alt="karavan">
    </div>
    <div class="col-md-6 mt-4 mt-sm-0">
        <h4>
            <?php echo $mision['mv_title'] ?>
        </h4>
        <span class="lead">
            <?php echo $mision['mv_content'] ?>
        </span>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-6 order-md-2 order-2 order-md-1  mt-4 mt-sm-0">
        <h4>
            <?php echo $vision['mv_title'] ?>
        </h4>
        <span class="lead">
            <?php echo $vision['mv_content'] ?>
        </span>
    </div>
    <div class="col-md-6 order-md-1 order-1 order-md-2">
        <img src="assets/img/<?php echo $vision['mv_image'] ?>" class="img-fluid" alt="karavan">
    </div>
</div>