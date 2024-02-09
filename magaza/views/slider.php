<?php include __DIR__ . '/../business/magaza-slider.response.php' ?>
<section id="slider" data-aos="zoom">
  <div class="container">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <?php foreach ($sliderItems as $key => $item): ?>
          <a href="<?php echo $item['slider_url'] ?>">
            <div class="carousel-item <?php echo $key === 0 ? 'active' : ''; ?>">
              <img src="assets/img/slider/<?php echo $item['slider_path'] ?>" class="d-block w-100" alt="...">
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>