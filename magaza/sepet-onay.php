<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/cart-approved.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilgilerim">Profil</a></li>
            <li>Onaylanan Sepet</li>
        </ol>
        <h2>Onaylanan Sepet</h2>

    </div>
</section>
<section class="container" id="home-products">
    <div class="row">
        <div class="col-lg-7" data-aos="fade-right">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="business/cart-approved.request.php" method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <h3 class="h2-featured mb-3">Kargo Bilgileri</h3>
                            <div class="row">
                                <div class="col mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="form12">Ad</label>
                                        <input type="text" id="form12" class="form-control" required
                                            name="user_first_name"
                                            value="<?php echo $userInformationData['user_first_name'] ?>" />
                                        <div class="invalid-feedback">Ad boş bırakılamaz.</div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form12">Soyad</label>
                                        <input type="text" id="form12" class="form-control" required
                                            name="user_last_name"
                                            value="<?php echo $userInformationData['user_last_name'] ?>" />
                                        <div class="invalid-feedback">Soyad boş bırakılamaz.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone-number">Telefon</label>
                                        <div class="input-group flex-nowrap form-outline mb-3">
                                            <span class="input-group-text" id="addon-wrapping">+90</span>
                                            <input type="text" id="phone-number" class="form-control"
                                                name="user_phone_number" required
                                                value="<?php echo substr($userInformationData['user_phone_number'], 4) ?>"
                                                onkeydown="phoneNumberFormatter()" />
                                            <div class="invalid-feedback">Telefon boş bırakılamaz.</div>
                                        </div>
                                    </div>

                                    <script>
                                        function formatPhoneNumber(value) {
                                            if (!value) return value;
                                            const phoneNumber = value.replace(/[^\d]/g, '');
                                            const phoneNumberLength = phoneNumber.length;
                                            if (phoneNumberLength < 4) return phoneNumber;
                                            if (phoneNumberLength < 7) {
                                                return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3)}`;
                                            }
                                            if (phoneNumberLength < 9) {
                                                return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6, 8)}`;
                                            }
                                            return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6, 8)} ${phoneNumber.slice(8, 9)}`;
                                        }
                                        function phoneNumberFormatter() {
                                            const inputField = document.getElementById('phone-number');
                                            const formattedInputValue = formatPhoneNumber(inputField.value);
                                            inputField.value = formattedInputValue;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <h3 class="h2-featured mb-3">Kargo Adresi</h3>

                            <?php foreach ($addressData as $key => $address): ?>
                                <div class="col-lg-6">
                                    <div class="card bg-light adres-card mb-3">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="cargo_address" <?php echo $address['contact_favorite'] ? 'checked' : '' ?> required
                                                    value="<?php echo $address['contact_id'] ?>">
                                                <label class="form-check-label"><b>
                                                        <?php echo $address['contact_title'] ?>
                                                    </b></label>
                                            </div>

                                            <hr>
                                            <span>
                                                <?php echo $address['contact_address'] ?><br>
                                                <?php echo $address['contact_district'] ?>/
                                                <?php echo $address['contact_city'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-6">
                                <a href="adreslerim">
                                    <div class="card bg-light adres-card mb-3">
                                        <div class="card-body text-center">
                                            <h4 class="add-address-h4"><i class=' bx bx-plus'></i> Adres Ekle</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="h2-featured mb-3">Fatura Bilgileri</h3>
                            <div class="row">
                                <div class="col mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="form12">Ad</label>
                                        <input type="text" id="form12" class="form-control" required
                                            name="invoice_user_first_name"
                                            value="<?php echo $userInformationData['user_first_name'] ?>" />
                                        <div class="invalid-feedback">Ad boş bırakılamaz.</div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form12">Soyad</label>
                                        <input type="text" id="form12" class="form-control" required
                                            name="invoice_user_last_name"
                                            value="<?php echo $userInformationData['user_last_name'] ?>" />
                                        <div class="invalid-feedback">Soyad boş bırakılamaz.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone-number">Telefon</label>
                                        <div class="input-group flex-nowrap form-outline mb-3">
                                            <span class="input-group-text" id="addon-wrapping">+90</span>
                                            <input type="text" id="phone-number-invoice" class="form-control"
                                                name="invoice_user_phone_number" required
                                                value="<?php echo substr($userInformationData['user_phone_number'], 4) ?>"
                                                onkeydown="phoneNumberFormatterForInvoice()" />
                                            <div class="invalid-feedback">Telefon boş bırakılamaz.</div>
                                        </div>
                                    </div>

                                    <script>
                                        function formatPhoneNumber(value) {
                                            if (!value) return value;
                                            const phoneNumber = value.replace(/[^\d]/g, '');
                                            const phoneNumberLength = phoneNumber.length;
                                            if (phoneNumberLength < 4) return phoneNumber;
                                            if (phoneNumberLength < 7) {
                                                return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3)}`;
                                            }
                                            if (phoneNumberLength < 9) {
                                                return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6, 8)}`;
                                            }
                                            return `${phoneNumber.slice(0, 3)} ${phoneNumber.slice(3, 6)} ${phoneNumber.slice(6, 8)} ${phoneNumber.slice(8, 9)}`;
                                        }
                                        function phoneNumberFormatterForInvoice() {
                                            const inputField = document.getElementById('phone-number-invoice');
                                            const formattedInputValue = formatPhoneNumber(inputField.value);
                                            inputField.value = formattedInputValue;
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="same_address"
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">Fatura Kargo Adresime
                                        Gönderilsin</label>
                                </div>
                            </div>
                            <div id="fatura_adresleri">
                                <div class="row">
                                    <?php foreach ($addressData as $key => $address): ?>
                                        <div class="col-lg-6">
                                            <div class="card bg-light adres-card mb-3">
                                                <div class="card-body">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" name="învoice_address"
                                                            <?php echo $address['contact_favorite'] ? 'checked' : '' ?>
                                                            required value="<?php echo $address['contact_id'] ?>">
                                                        <label class="form-check-label"><b>
                                                                <?php echo $address['contact_title'] ?>
                                                            </b></label>
                                                    </div>
                                                    <hr>
                                                    <span>
                                                        <?php echo $address['contact_address'] ?><br>
                                                        <?php echo $address['contact_district'] ?>/
                                                        <?php echo $address['contact_city'] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-6">
                                        <a href="adreslerim">
                                            <div class="card bg-light adres-card mb-3">
                                                <div class="card-body text-center">
                                                    <h4 class="add-address-h4"><i class=' bx bx-plus'></i> Adres Ekle
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add_order" class="btn basket-approve-btn w-100 mb-3">Alışverişi
                            Tamamla</button>
                    </form>
                    <form action="business/cart-approved.request.php" method="POST">
                        <button type="submit" name="cancel_shop" class="btn basket-approve-btn w-100 mb-3">Alışverişi
                            İptal
                            Et</button>
                    </form>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, provident magni. Doloremque
                        nesciunt itaque nemo recusandae cumque? Molestiae accusamus, corrupti quo ex, distinctio
                        voluptates facilis atque cum in porro iure!</span>
                </div>

            </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0"  data-aos="fade-left">
            <?php foreach ($cartApprovedData as $product): ?>
                <?php $totalPrice += ($product['discounted_price'] * $product['quantity']) ?>
                <div class="card mb-3">
                    <div class="card-body p-3 p-md-4 p-sm-3">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="assets/img/products/<?php echo $product['photo_name'] ?>"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 85px;">
                            </div>
                            <div class="col">
                                <div class="row justify-content-lg-between justify-content-end">
                                    <div class="col-auto text-md-start text-center">
                                        <h5 style="margin-bottom:0">
                                            <a href="ihpone-15-8">
                                                <?php echo $product['product_name'] ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row align-items-center justify-content-end">
                                            <div class="col-auto">
                                                <?php echo $product['quantity'] ?>
                                            </div>
                                            <div class="col-auto">
                                                <?php echo number_format(($product['discounted_price'] * $product['quantity']), 2, ',', '.') ?>
                                                TL
                                            </div>
                                            <div class="col-auto">
                                                <form action="business/cart.request.php" method="POST">
                                                    <input type="hidden" name="cart_id"
                                                        value="<?php echo $product['cart_id'] ?>">
                                                    <button type="submit" class="btn btn-sm trash-button "
                                                        style="color: #cecece;" name="delete_from_cart">
                                                        <i class='bx bxs-trash'></i>
                                                    </button>
                                                </form>
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
                <h2 class="h2-featured h2-total text-end">
                    Toplam :
                    <?php echo number_format($totalPrice, 2, ',', '.') ?> TL
                    </h1>
            </div>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus in esse deserunt, eveniet
                provident nobis ipsam fugit explicabo, cum corporis odit tempora et tempore consequuntur est voluptatem
                quos beatae illum?
            </span>
        </div>
    </div>
</section>
<script>
    (() => {
        'use strict';

        const forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
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