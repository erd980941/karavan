<?php include __DIR__ . '/../business/footer.response.php' ?>
<a href="https://wa.me/<?php echo preg_replace('/[^\d\+]/','', $siteContactInformationData['site_tel']) ?>" style="z-index:10 !important;"  target="_blank">
  <div class="k-wp-btn">
    <span class="position-absolute top-50 start-50 translate-middle"><i class='bx bxl-whatsapp'></i></span>
  </div>
</a>
<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6">
          <div class="footer-info">
            <h3>İletişim</h3>
            <p>
              <?php echo $siteContactInformationData['site_address'] ?> <br>
              <?php echo $siteContactInformationData['site_district'] ?> / <?php echo $siteContactInformationData['site_city'] ?><br><br>
              <strong>Telefon:</strong> <?php echo $siteContactInformationData['site_tel'] ?><br>
              <strong>E-Posta:</strong> <?php echo $siteContactInformationData['site_email'] ?><br>
            </p>
            <div class="social-links mt-3">
              <a href="<?php echo $socialMediaFooter['facebook'] ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?php echo $socialMediaFooter['instagram'] ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="<?php echo $socialMediaFooter['linkedin'] ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a href="<?php echo $socialMediaFooter['youtube'] ?>" class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="footer-info">
            <h3>Mağazalarımız</h3>
            <div class="row justify-content-center">
              <div class="col-auto">
                <ul>
                  <li><a href="<?php echo $socialMediaFooter['hepsiburada'] ?>" target="_blank"><i class="bx bx-store me-2"></i> <span>
                        <?php echo $socialMediaFooter['hepsiburada'] ?>
                      </span></a></li>
                  <li><a href="<?php echo $socialMediaFooter['n11'] ?>" target="_blank"><i class="bx bx-store me-2"></i> <span>
                        <?php echo $socialMediaFooter['n11'] ?>
                      </span></a></li>
                  <li><a href="<?php echo $socialMediaFooter['sahibinden'] ?>" target="_blank"><i class="bx bx-store me-2"></i> <span>
                        <?php echo $socialMediaFooter['sahibinden'] ?>
                      </span></a></li>
                  <li><a href="<?php echo $socialMediaFooter['trendyol'] ?>" target="_blank"><i class="bx bx-store me-2"></i> <span>
                        <?php echo $socialMediaFooter['trendyol'] ?>
                      </span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Menü</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/">Anasayfa</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/magaza">Mağaza</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/hakkimizda">Hakkımızda</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/misyon-vizyon">Misyon ve Vizyon</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/belgelerimiz">Belgelerimiz</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/iletisim">İletişim</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Tiny House</h4>
          <ul>
            <?php foreach ($categoriesTypeTinyHouseFooter as $item): ?>
              <li><i class="bx bx-chevron-right"></i>
                <a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                  <?php echo $item['category_name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Tiny Ticari</h4>
          <ul>
            <?php foreach ($categoriesTypeTinyTicariFooter as $category): ?>
              <li><i class="bx bx-chevron-right"></i>
                <a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                  <?php echo $item['category_name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Karavan</h4>
          <ul>
            <?php foreach ($categoriesTypeKaravanFooter as $category): ?>
              <li><i class="bx bx-chevron-right"></i>
                <a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                  <?php echo $item['category_name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Römork</h4>
          <ul>
            <?php foreach ($categoriesTypeRomorkFooter as $category): ?>
              <li><i class="bx bx-chevron-right"></i>
                <a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                  <?php echo $item['category_name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6 footer-links">
          <h4>Marin</h4>
          <ul>
            <?php foreach ($categoriesTypeMarinFooter as $category): ?>
              <li><i class="bx bx-chevron-right"></i>
                <a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                  <?php echo $item['category_name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>


      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
       Copyright <strong> &copy; <span><?php echo $siteSettingsData['site_title'] ?></span></strong>. Tüm Hakları Saklıdır
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
       <a href="https://www.linkedin.com/in/erdf15/" target="_blank" >Erdal Fidan</a> Tarafından Tasarlanmıştır.
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->

<script src="<?= base_url ?>/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url ?>/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url ?>/assets/js/main.js"></script>

</body>

</html>