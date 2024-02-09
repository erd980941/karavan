<?php include __DIR__.'/../business/why-us.response.php' ?>
<div class="row justify-content-between">
    <?php foreach($whyUsItems as $i=>$item ): ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mt-4 mt-xl-0" data-aos="fade-up">
            <div class="box">
                <span><?php echo $i+1 ?></span>
                <h4><?php echo $item['why_us_title'] ?></h4>
                <p><?php echo $item['why_us_content'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
