<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/pending-payment.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilglerim">Profil</a></li>
            <li>Ödeme Bekleyen Siparişlerim</li>
        </ol>
        <h2>Ödeme Bekleyen Siparişlerim</h2>

    </div>
</section>
<section class="container" id="home-products">
    
    <div class="row">
        <div class="col-lg-3" data-aos="fade-right">
            <?php include 'views/profil-side-menu.php' ?>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0" data-aos="zoom-in" >
            <div class="row">

                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body p-1 p-md-4 p-sm-2">
                            <?php foreach ($orders as $key =>$order): ?>
                                <div class="siparis-accordion-item mb-3" data-aos="fade-up" data-aos-delay="<?php echo $key*400 ?>">
                                    <button class="accordion">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-6">
                                                <span><b>Sipariş No</b>:
                                                    <?php echo $order['order_number'] ?>
                                                </span><br>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-md-between justify-content-end">
                                                    <div class="col-auto text-center">
                                                        <div class="col-auto text-center">
                                                            <?php if ($order['order_status'] == 'Onay Bekliyor'): ?>
                                                                <span class="text-warning">
                                                                    <?php echo $order['order_status'] ?>
                                                                </span>
                                                            <?php elseif ($order['order_status'] == 'Teslim Edildi'): ?>
                                                                <span class="text-success">
                                                                    <?php echo $order['order_status'] ?>
                                                                </span>
                                                            <?php elseif ($order['order_status'] == 'İptal Edildi'): ?>
                                                                <span class="text-danger">
                                                                    <?php echo $order['order_status'] ?>
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="text-info">
                                                                    <?php echo $order['order_status'] ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-end">
                                                        <b >
                                                            <?php echo number_format($order['total_amount'], 2, ',', '.') ?>
                                                            TL
                                                        </b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="panel">
                                        <hr class="accordion-hr">
                                        <?php $orderDetails = getOrderDetails($order['order_id']); ?>
                                        <?php foreach ($orderDetails as $orderDetail): ?>
                                            <div class="card ms-md-3 mb-md-3 me-md-3">
                                                <div class="card-body p-3 p-md-4 p-sm-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="assets/img/products/<?php echo $orderDetail['photo_name'] ?>"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 85px;">
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
                                                                            <?php echo $orderDetail['subtotal'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div
                                            class="row ms-md-3 mb-md-3 me-md-3 ms-1 mb-2 me-1 mt-2 align-items-center justify-content-end">
                                            <div class="col-auto">
                                                <form action="odeme" method="POST">
                                                    <input type="hidden" name="order_id"
                                                        value="<?php echo $order['order_id'] ?>">
                                                    <button type="submit" class="btn primary-button-2" name="odeme">Ödeme
                                                        Yap</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div
                                            class="row ms-md-3 mb-md-3 me-md-3 ms-2 mb-2 me-2 align-items-center justify-content-between">
                                            <h5 style="color:#484848" class="mb-3">Adres Bilgileri</h5>
                                            <?php $orderShippingInfos = getOrderShippingInfo($order['order_id']) ?>
                                            <?php foreach ($orderShippingInfos as $shippingInfo): ?>
                                                <?php if ($shippingInfo['shipping_type'] == 'Ürün'): ?>
                                                    <!-- Teslimat Adresi -->
                                                    <div class="col-lg-6">
                                                        <h6 style="color:#484848">Teslimat Adresi</h6>
                                                        <address style="color:#484848; font-size:13px">
                                                            <?php echo $shippingInfo['recipient_address']; ?><br>
                                                            <?php echo $shippingInfo['recipient_district']; ?> /
                                                            <?php echo $shippingInfo['recipient_city']; ?><br>
                                                            <b>
                                                                <?php echo $shippingInfo['recipient_name']; ?>
                                                                <?php echo $shippingInfo['recipient_surname']; ?>
                                                            </b> - <b>
                                                                <?php echo $shippingInfo['phone_number']; ?>
                                                            </b>
                                                        </address>
                                                    </div>
                                                <?php elseif ($shippingInfo['shipping_type'] == 'Fatura'): ?>
                                                    <!-- Fatura Bilgileri -->
                                                    <div class="col-lg-6">
                                                        <h6 style="color:#484848">Fatura Bilgileri</h6>
                                                        <address style="color:#484848; font-size:13px">
                                                            <?php echo $shippingInfo['recipient_address']; ?><br>
                                                            <?php echo $shippingInfo['recipient_district']; ?> /
                                                            <?php echo $shippingInfo['recipient_city']; ?><br>
                                                            <b>
                                                                <?php echo $shippingInfo['recipient_name']; ?>
                                                                <?php echo $shippingInfo['recipient_surname']; ?>
                                                            </b> - <b>
                                                                <?php echo $shippingInfo['phone_number']; ?>
                                                            </b>
                                                        </address>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<?php include 'views/footer.php' ?>