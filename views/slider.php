<?php include __DIR__.'/../business/slider-item.response.php' ?>
<!-- ======= Hero Section ======= -->
<section id="hero"  >
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <?php foreach($sliderItems as $item ): ?>
          <!-- Slide 1 -->
          <div class="carousel-item <?php echo $item['order_priority'] === $smallestOrderPriority ? 'active' : ''; ?>" style="<?php echo $item['slider_type']=="image"?"background: url('assets/img/slider/".$item['slider_path']."') center/cover no-repeat;":"" ?>" >
            <?php if($item['slider_type']=='video'): ?>
              <video autoplay muted loop id="video-bg">
                <source src="assets/img/slider/<?php echo $item['slider_path'] ?>" type="video/mp4">
              </video>
            <?php endif; ?>
            <div class="carousel-container">
              <div class="carousel-content container">
              <?php $sliderTitle=sliderExplodeText($item['slider_title']); ?>
                <h1 class="animate__animated animate__fadeInDown"><?php echo $sliderTitle['slider_h1'] ?></h1>
                <h2 class="animate__animated animate__fadeInUp"><?php echo $sliderTitle['slider_h2'] ?></h2>
                <a href="/magaza/" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ürünlerimiz <i
                    class="bi bi-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>
  </div>
</section><!-- End Hero -->
