<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>

<section class="container mt-4" id="home-products">
    <ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="kullanici-bilgilerim"><i class="fa-solid fa-user"></i> Profil</a></li>
        <li><a href="siparis-onay"><i class="fa-solid fa-boxes-packing"></i>Sipariş Onay</a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-lg-7">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-4">
                        <h3 class="h2-featured mb-3">Kargo Bilgileri</h3>
                        <div class="col-lg-6">
                            <div class="form-outline mb-3">
                                <input type="text" id="form12" class="form-control" />
                                <label class="form-label" for="form12">Ad</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-outline mb-3">
                                <input type="text" id="form12" class="form-control" />
                                <label class="form-label" for="form12">Soyad</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-outline mb-3">
                                <input type="text" id="form12" class="form-control" />
                                <label class="form-label" for="form12">Telefon</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <h3 class="h2-featured mb-3">Kargo Adresi</h3>
                        <div class="col-lg-6">
                            <div class="card bg-light adres-card mb-3">
                                <div class="card-body">
                                    <input type="radio" id="html" name="fav_language" value="HTML"> <b>Adres 1</b>
                                    <hr>
                                    <span>Erenler Mah. Gazanger Bilge Bulv. İzmit Kocaeli</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-light adres-card mb-3">
                                <div class="card-body">
                                    <input type="radio" id="html" name="fav_language" value="HTML"> <b>Adres 1</b>
                                    <hr>
                                    <span>Erenler Mah. Gazanger Bilge Bulv. İzmit Kocaeli</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-light adres-card mb-3">
                                <div class="card-body">
                                    <input type="radio" id="html" name="fav_language" value="HTML"> <b>Adres 1</b>
                                    <hr>
                                    <span>Erenler Mah. Gazanger Bilge Bulv. İzmit Kocaeli</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <a href="#">
                                <div class="card bg-light adres-card mb-3">
                                    <div class="card-body text-center">
                                        <h4><i class="fa-solid fa-plus"></i> Adres Ekle</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="h2-featured mb-3">Kargo Adresi</h3>
                        <div class="col-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">Fatura Kargo Adresime
                                    Gönderilsin</label>
                            </div>
                        </div>
                        <div id="fatura_adresleri">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card bg-light adres-card mb-3">
                                        <div class="card-body">
                                            <input type="radio" id="adres1" name="fatura_adres" value="adres1"> <b>Adres
                                                1</b>
                                            <hr>
                                            <span>Erenler Mah. Gazanger Bilge Bulv. İzmit Kocaeli</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card bg-light adres-card mb-3">
                                        <div class="card-body">
                                            <input type="radio" id="adres1" name="fatura_adres" value="adres1"> <b>Adres
                                                2</b>
                                            <hr>
                                            <span>Erenler Mah. Gazanger Bilge Bulv. İzmit Kocaeli</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block mb-3">Button</button>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, provident magni. Doloremque
                        nesciunt itaque nemo recusandae cumque? Molestiae accusamus, corrupti quo ex, distinctio
                        voluptates facilis atque cum in porro iure!</span>
                </div>
            </div>

        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                                <h5>Samsung galaxy Note 10 </h5>
                                <p class="small mb-0">256GB, Navy Blue</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">2</h5>
                            </div>
                            <div style="width: 80px;">
                                <h5 class="mb-0">$900</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                                <h5>Samsung galaxy Note 10 </h5>
                                <p class="small mb-0">256GB, Navy Blue</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">2</h5>
                            </div>
                            <div style="width: 80px;">
                                <h5 class="mb-0">$900</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-end">
                <h2>Toplam : 10000TL</h1>
            </div>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus in esse deserunt, eveniet
                provident nobis ipsam fugit explicabo, cum corporis odit tempora et tempore consequuntur est voluptatem
                quos beatae illum?</span>
        </div>
    </div>
</section>

<script>
    const checkbox = document.getElementById('flexCheckDefault');
    const rowToHide = document.querySelector('#fatura_adresleri');

    checkbox.addEventListener('change', function () {
        if (this.checked) {
            rowToHide.style.display = 'none';
        } else {
            rowToHide.style.display = 'block'; // ya da 'flex' vs.
        }
    });
</script>
<?php include 'views/footer.php' ?>