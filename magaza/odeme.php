<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/payment.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilglerim">Profil</a></li>
            <li><a href="./sepet-onay">Onaylanan Sepet</a></li>
            <li>Ödeme</li>
        </ol>
        <h2>Ödeme</h2>

    </div>
</section>
<section class="container" id="home-products">
    
    <div class="row">
        <div class="order-lg-1 order-2 col-lg-7"  data-aos="fade-right">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-4">
                        <h3 class="h2-featured mb-3">Havale İle Ödeme</h3>
                        <div class="col-12">
                            <p style="color:#484848;">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Repellendus in esse
                                deserunt, eveniet
                                provident nobis ipsam fugit explicabo, cum corporis odit tempora et tempore consequuntur
                                est voluptatem
                                quos beatae illum?<br>

                            </p>
                            <hr>
                            <div class="card border border-dark mb-3">
                                <div class="card-header">Sipariş Numarası</div>
                                <div class="card-body">
                                    <span class="btn btn-light">
                                        <?php echo $order['order_number'] ?>

                                    </span>
                                </div>
                            </div>
                            <?php foreach($bankAccounts as $bankAccount): ?>
                                <div class="card bg-dark text-white rounded-3 mb-3">
                                    <div class="card-body">
    
                                        <h5><?php echo $bankAccount['bank_name'] ?> <b>(<?php echo $bankAccount['currency_type'] ?>)</b></h5>
                                        <span>
                                            <?php echo $bankAccount['account_iban'] ?>
                                        </span><br>
                                        <span>
                                            <?php echo $bankAccount['bank_name'] ?>
                                        </span><br>
    
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <form action="business/payment.request.php" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id'] ?>">
                        <button type="submit" name="update_payment_status" class="btn primary-button-2 w-100 mb-3">Ödeme
                            Yaptım</button>
                    </form>
                    <a href="odeme-bekleyen" class="btn primary-button-2 w-100 mb-3">Vazgeç</a>
                    <span style="color:#484848;">Havale işlemini gerçekleştirdikten sonra yukarıda bulunan butona
                        tıklayarak
                        siparişinizin onaylanıp kargolanmasını bekleyiniz.
                        nesciunt itaque nemo recusandae cumque? Molestiae accusamus, corrupti quo ex, distinctio
                        voluptates facilis atque cum in porro iure!</span>
                </div>
            </div>

        </div>

        <div class="order-lg-2 order-1 col-lg-5 mt-4 mt-lg-0"  data-aos="fade-left">
            <?php foreach ($orderDetails as $orderDetail): ?>
                <div class="card mb-3">
                    <div class="card-body p-3 p-md-4 p-sm-3">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="assets/img/products/<?php echo $orderDetail['photo_name'] ?>"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 85px;">
                            </div>
                            <div class="col">
                                <div class="row justify-content-lg-between justify-content-end">
                                    <div class="col-auto text-md-start text-center">
                                        <h5 style="margin-bottom:0">
                                            <a href="ihpone-15-8">
                                                <?php echo $orderDetail['product_name'] ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row">
                                            <div class="col-auto">
                                                <?php echo $orderDetail['quantity'] ?>
                                            </div>
                                            <div class="col-auto">
                                                <?php echo number_format($orderDetail['subtotal'], 2, ',', '.') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <div class="text-end">
                <h2 class="h2-total" >Toplam :
                    <?php echo number_format($order['total_amount'], 2, ',', '.') ?>
                    </h1>
            </div>
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