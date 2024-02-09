<?php include __DIR__ . '/../business/navbar.response.php' ?>
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
<header id="header" class=" align-items-center nav-middle-bar">
    <div class="container  align-items-center justify-content-between">
        <div class="row justify-content-between align-items-center gy-3">
            <div class="col-lg-2 col-sm-4 col-4">
                <a href="/"><img src="<?= base_url ?>/assets/img/<?php echo $siteLogoPath ?>" width="80"></a>

            </div>
            <div class="order-lg-last col-auto text-end">
                <?php if ($loggedIn): ?>
                    <a href="sepet" type="button" class="btn btn-primary position-relative navbar-end-button me-3">
                        <i class="bi bi-cart2"></i>
                        <?php if ($cartCount > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $cartCount; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle navbar-end-button"
                        data-bs-toggle="dropdown" style="height:44.2px;display:flex;align-items:center;">
                        <i class='bx bx-user'></i>
                    </button>
                    <?php if ($loggedIn): ?>
                        <ul class="dropdown-menu dropdown-menu-lg-end custom-navbar-dropdown">
                            <li><a class="dropdown-item" href="kullanici-bilgilerim">Kullanıcı Bilgilerim</a></li>
                            <li><a class="dropdown-item" href="sifre-degistir">Şifre Değiştir</a></li>
                            <li><a class="dropdown-item" href="siparislerim">Siparişlerim</a></li>
                            <li><a class="dropdown-item" href="odeme-bekleyen">Ödeme Bekleyen Siparişlerim</a></li>
                            <li><a class="dropdown-item" href="sepet-onay">Onaylanan Sepet</a></li>
                            <li><a class="dropdown-item" href="adreslerim">Adreslerim</a></li>
                            <li><a class="dropdown-item" href="business/logout.php">Çıkış Yap</a></li>
                        </ul>
                    <?php else: ?>
                        <ul class="dropdown-menu dropdown-menu-lg-end custom-navbar-dropdown">
                            <li><a class="dropdown-item" href="giris-yap">Giriş Yap</a></li>
                            <li><a class="dropdown-item" href="kayit-ol">Kayıt Ol</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-lg-5 col-md-12 col-12 align-items-center">
                <form action="urunler" method="GET">
                    <div class="input-group align-items-center">
                        <input type="text" class="form-control navbar-search-input" placeholder="Ürün Ara.."
                            name="search_query" required>
                        <button class="btn btn-outline-secondary navbar-search-button" type="submit">
                            <i class='bx bx-search-alt me-2 ms-2'></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    </div>
</header>
<header id="header" class="d-flex align-items-center nav-bottom-bar d">
    <div class="container text-end">
        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown me-0 me-lg-3 category-menu">
                    <a href="#"><b>Kategoriler</b> <i class="bi bi-chevron-down"></i>
                    </a>
                    <?php include __DIR__.'/category-navbar.php' ?>
                </li>
                <li><a class="nav-link scrollto" href="/">Anasayfa</a></li>
                <li><a class="nav-link scrollto" href="/magaza/">Mağaza</a></li>
                <li class="dropdown"><a href="#"><span>Kurumsal</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/hakkimizda">Hakkımızda</a></li>
                        <li><a href="/misyon-vizyon">Misyon Vizyon</a></li>
                        <li><a href="/belgelerimiz">Belgelerimiz</a></li>
                    </ul>
                </li>
                <?php include __DIR__ . '/../../views/k-category-nav-list.php' ?>
                <li><a class="nav-link scrollto" href="/iletisim">İletişim</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle navbar-toggle-icon ms-auto"></i>
        </nav><!-- .navbar -->

    </div>
</header>