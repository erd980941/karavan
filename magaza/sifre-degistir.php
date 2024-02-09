<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/user-information.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilgilerim">Profil</a></li>
            <li>Şifre Değiştir</li>
        </ol>
        <h2>Şifre Değiştir</h2>

    </div>
</section>
<section class="container" id="home-products">

    <div class="row ">
        <div class="col-lg-3" data-aos="fade-right">
            <?php include 'views/profil-side-menu.php' ?>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0" data-aos="fade-left">
            <div class="row">

                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h2-featured mb-3">Şifre Değiştir</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque explicabo amet beatae
                                eius earum quod in culpa corporis reprehenderit? Iste magni eligendi consequatur ipsam
                                pariatur, itaque laboriosam praesentium ullam accusantium.</p>
                            <form action="business/change-password.php" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="current-password">Mevcut Şifre</label>
                                        <input type="password" id="current-password" class="form-control"
                                            name="current_password" />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="new-password">Yeni Şifre</label>
                                        <input type="password" id="new-password" class="form-control"
                                            name="new_password" />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="confirm-password">Yeni Şifre Tekrar</label>
                                        <input type="password" id="confirm-password" class="form-control"
                                            name="confirm_password" />
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="change_password"
                                    class="btn primary-button primary-border w-100 mb-4">Şifre Değiştir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>