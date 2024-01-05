<?php require_once 'views/header.php'; ?>
<?php require_once 'views/navbar.php'; ?>
<?php require_once 'views/slider.php'; ?>

<section class="hakkimizda">
    <div class="container mt-5">
        <?php include 'views/about-us-page.php' ?>
    </div>
</section>
<section class="mision-vision">
    <div class="container my-5 py-5">
        <?php include 'views/mision-vision-page.php' ?>
    </div>
</section>
<section class="container">
    <div class="row my-5">
        <?php include 'views/our-brand-page.php' ?>
    </div>

</section>
<section class="page-section k-about-magaza" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Karavanın İhtiyacı, Burada Buluşuyor</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Elma Karavan Mağazası, karavan tutkunları için eksiksiz bir çözüm sunuyor.
                    Her marka ve modele uygun geniş bir yedek parça koleksiyonuyla, seyahatlerinizde güvenle yol
                    almanızı sağlıyoruz. Motor parçalarından iç dekorasyon ürünlerine kadar ihtiyacınız olan her şeyi
                    bulabilirsiniz. Sizi seyahatlerinizde yalnız bırakmayacak, kaliteli ve güvenilir yedek parçalar için
                    doğru adrestesiniz.
                    
                </p>
                <a class="btn btn-light btn-xl" href="magaza">Mağazaya Git!</a>
            </div>
        </div>
    </div>
</section>
<section class="galeri" >
    <div class="container my-5">
        <?php include 'views/gallery-page.php' ?>
    </div>
</section>
<section class="belgelerimiz">
    <div class="container">
        <?php include 'views/our-document-page.php' ?>
    </div>
</section>



<script src="assets/js/scripts.js"></script>

<?php require_once 'views/footer.php'; ?>