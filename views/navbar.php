
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <a href="mailto:<?php echo $siteContactInformationData['site_email'] ?>"><i class="bi bi-envelope-fill"></i>
                <?php echo $siteContactInformationData['site_email'] ?>
            </a>
            <a href="tel:<?php echo $siteContactInformationData['site_tel'] ?>"><i
                    class="bi bi-phone-fill phone-icon"></i>
                <?php echo $siteContactInformationData['site_tel'] ?>
            </a>
        </div>
        <div class="social-links d-none d-md-block">
            <a href="<?php echo $socialMediaData['facebook'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo $socialMediaData['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo $socialMediaData['linkedin'] ?>" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            <a href="<?php echo $socialMediaData['youtube'] ?>" class="youtube"><i class="bi bi-youtube"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="<?= base_url ?>"><img src="<?=base_url?>/assets/img/<?php echo $siteLogoPath ?>" width="80"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url ?>">Anasayfa</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url ?>/magaza">Mağaza</a></li>
                <li class="dropdown"><a href="#"><span>Kurumsal</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?= base_url ?>/hakkimizda">Hakkımızda</a></li>
                        <li><a href="<?= base_url ?>/misyon-vizyon">Misyon Vizyon</a></li>
                        <li><a href="<?= base_url ?>/belgelerimiz">Belgelerimiz</a></li>
                    </ul>
                </li>
                <?php include __DIR__.'/k-category-nav-list.php' ?>
                <li><a class="nav-link scrollto" href="<?= base_url ?>/iletisim">İletişim</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle navbar-toggle-icon"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->