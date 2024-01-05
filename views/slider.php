<?php include __DIR__ . '/../business/slider-item.response.php' ?>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-inner">
        <?php foreach ($sliderItems as $item): ?>
            <div
                class="carousel-item d-flex <?php echo $item['order_priority'] === $smallestOrderPriority ? 'active' : ''; ?>">
                <?php if ($item['slider_type'] == 'image'): ?>
                    <img src="assets/img/slider/<?php echo $item['slider_path'] ?>" class="d-block w-100 align-self-center"
                        alt="...">
                <?php else: ?>
                    <video class="d-block w-100 align-self-center" muted autoplay loop>
                        <source class="object-fit-cover" src="assets/img/slider/<?php echo $item['slider_path'] ?>"
                            type="video/mp4" />
                    </video>
                <?php endif; ?>
                <div class="carousel-caption text-start k-slogan">
                    <div class="align-self-end">
                        <h4 class="ms-5 mb-3" >Elma Karavan</h4>
                        <h1 class="text-white font-weight-bold k-slider-h1">
                            Özgürlüğün Tadını Çıkarın, Maceranın Anahtarını Keşfedin
                        </h1>
                    </div>
                    <div class="text-start">
                        <a class="btn  k-slider-btn" href="#about">Ürünlerimiz <i class="fa-solid fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>