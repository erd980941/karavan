<a href="https://wa.me/<?php echo preg_replace('/[^\d\+]/','', $siteContactInformationData['site_tel']) ?>" style="z-index:10 !important;" >
  <div class="k-wp-btn">
    <span class="position-absolute top-50 start-50 translate-middle"><i class="fa-brands fa-whatsapp"></i></span>
  </div>
</a>
<!-- Footer-->
<div class="bg-primary text-white mt-5">
  <div class="container">
    <footer class="row py-5 justify-content-between">
      <div class="col-lg-5 col-md-12  mb-3">
        <p class="text-white">© 2023
          <?php echo $siteSettingsData['site_title'] ?>. Tüm Hakları Saklıdır.
        </p>
        <p class="text-white-50">Bu web sitesinde bulunan tüm içerikler, yazılar, görseller, grafikler, ses dosyaları ve
          diğer materyaller Şirket Adı'na aittir ve telif hakkı koruması altındadır. Bu materyallerin izinsiz kullanımı
          yasaktır.</p>
      </div>

      <div class="col-lg-3 col-md-6 col-6 mb-3">
        <h5>Menü</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-white-50">Anasayfa</a></li>
          <li class="nav-item mb-2"><a href="magaza/" class="nav-link p-0 text-white-50">Mağaza</a></li>
          <li class="nav-item mb-2"><a href="hakkimizda" class="nav-link p-0 text-white-50">Hakkımızda</a></li>
          <li class="nav-item mb-2"><a href="misyon-vizyon" class="nav-link p-0 text-white-50">Misyon Vizyon</a></li>
          <li class="nav-item mb-2"><a href="belgelerimiz" class="nav-link p-0 text-white-50">Belgelerimiz</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 col-6 mb-3">
        <h5>İletişim</h5>
        <address class="text-white-50">
          <?php echo $siteContactInformationData['site_address'] ?>
        </address>
        <span class="text-white-50">
          <?php echo $siteContactInformationData['site_district'] ?> /
          <?php echo $siteContactInformationData['site_city'] ?>
        </span>
        <br>
        <span class="text-white-50">
          <?php echo $siteContactInformationData['site_tel'] ?>
        </span>
      </div>



    </footer>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/owl-carousel/js/owl.carousel.min.js"></script>
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    autoplay: true, // Otomatik oynatma
    autoplayTimeout: 3000, // Otomatik oynatma süresi (milisaniye cinsinden)
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      },
      1400: {
        items: 5
      }
    }
  });
</script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a24a98907b.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.1.0/simple-lightbox.min.js"></script>

<script>
  // SimpleLightbox'u etkinleştirme
  var gallery = new SimpleLightbox('.gallery a');
</script>

</body>

</html>