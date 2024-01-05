<div class="top-bar">
    <div class="container">
        <div class="row justify-content-between align-items-center py-2">
            <div class="col-auto">
                <p class="m-0">Mağazaya Hoşgeldiniz</p>
            </div>
            <div class="col-auto">
                <a href="#">N11</a>
                <a href="#">Sahibinden</a>
                <a href="#">Hepsiburada</a>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="p-3 text-center bg-white">
        <div class="container">
            <div class="row justify-content-between align-items-center gy-3">
                <div class="col-lg-2 col-sm-4 col-4">
                    <a href="./" class="float-start">
                        <img src="../assets/img/<?php echo $siteLogoPath ?>" height="75" alt="">
                    </a>
                </div>


                <div class="order-lg-last col-auto text-end">
                    <div class="d-flex float-end">
                        <?php if ($loggedIn): ?>
                            <a href="kullanici-bilgilerim"
                                class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center">
                                <i class="fa-solid fa-user-gear m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Profil</p>
                            </a>
                            <a href="sepet" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center">
                                <i class="fas fa-shopping-cart m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Sepetim</p>
                            </a>
                            <a href="business/logout.php"
                                class="border rounded py-1 px-3 nav-link d-flex align-items-center">
                                <i class="fa-solid fa-right-from-bracket me-1"></i>
                                <p class="d-none d-md-block mb-0">Çıkış Yap</p>
                            </a>
                        <?php else: ?>
                            <a href="giris-yap" class=" border rounded py-1 px-3 nav-link d-flex align-items-center k-navbar-a">
                                <i class="fa-solid fa-right-to-bracket m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Giriş Yap</p>
                            </a>
                            <a href="kayit-ol" class="ms-1 border rounded py-1 px-3 nav-link d-flex align-items-center k-navbar-a">
                                <i class="fa-solid fa-user-plus  m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Kayıt Ol</p>
                            </a>
                        <?php endif; ?>


                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-12">
                    <form action="urunler" method="GET">
                        <div class="input-group float-center">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" name="search_query" required>
                                <label class="form-label" for="form1" style="margin-left: 0px;">Ürün Ara..</label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 47.2px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary shadow-0">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary k-navbar py-3">
        <!-- Container wrapper -->
        <div class="container justify-content-center justify-content-md-between">
            <!-- Toggle button -->
            <button class="navbar-toggler collapsed" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./">Mağaza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="urunler">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu name</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
</header>