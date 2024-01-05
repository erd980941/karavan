<div class="socialbar">
    <div class="container h-100">
    <div class=" row h-100 align-items-center justify-content-between">
        <div class="col-auto">
            <a href="tel:051412321"><span><i class="fa-solid fa-phone me-2"></i> +90 541 520 44 41</span></a>
            <a href="mail:erdal@gmail.com"><span class="ms-4" ><i class="fa-regular fa-envelope me-2"></i> erdal318@gmail.com</span></a>
        </div>
        <div class="col-auto">
            <a href="#"><span class="" ><i class="fa-brands fa-facebook-f"></i></span></a>
            <a href="#"><span class="ms-4" ><i class="fa-brands fa-instagram"></i></span></a>
            <a href="#"><span class="ms-4" ><i class="fa-brands fa-twitter"></i></span></a>
            
        </div>
    </div>
    </div>
</div>

<nav class=" navbar navbar-expand-lg navbar-light fixed-top py-3 " style="top:60px;padding:6px 0 !important;" id="mainNav">
    <div class="container ">
        <a class="navbar-brand" href="./">
            <img src="assets/img/<?php echo $siteLogoPath ?>" width="100" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="./">Anasayfa</a></li>
                <li class="nav-item"><a class="nav-link" href="magaza">Mağaza</a></li>
                <li class="nav-item"><a class="nav-link" href="magaza">Mağaza</a></li>
                <li class="nav-item"><a class="nav-link" href="hakkimizda">Kurumsal</a></li>
                <li class="nav-item"><a class="nav-link" href="misyon-vizyon">Misyonumuz ve Vizyonumuz</a></li>
                <li class="nav-item"><a class="nav-link" href="belgelerimiz">Belgelerimiz</a></li>
            </ul>
        </div>
    </div>
</nav>
<script>
  window.addEventListener('scroll', function() {
  var navbar = document.getElementById('mainNav'); // Navbar'ın ID'sini buraya ekleyin
  var scrollDistance = window.scrollY; // Sayfa üzerindeki scroll miktarını alın
  
  var newTop = Math.max(0, 60 - scrollDistance); // Yeni top değerini hesapla, en az 0 olacak şekilde
  navbar.style.top = newTop + 'px'; // Yeni top değerini ayarla
});
</script>