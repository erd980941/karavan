<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/cart-approved.response.php' ?>

<section class="container mt-4" id="home-products">
    <ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="sepet"><i class="fas fa-shopping-cart"></i> Sepetim</a></li>
        <li><a href="sepet-onay"><i class="fa-solid fa-cart-arrow-down"></i>Sepet Onay</a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-lg-7">

            <div class="card mb-3">
                <div class="card-body">
                    <form action="business/cart-approved.request.php" method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <h3 class="h2-featured mb-3">Kargo Bilgileri</h3>
                            <div class="row">
                                <div class="col mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form12" class="form-control" required
                                            name="user_first_name"
                                            value="<?php echo $userInformationData['user_first_name'] ?>" />
                                        <label class="form-label" for="form12">Ad</label>
                                        <div class="invalid-feedback">Ad boş bırakılamaz.</div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form12" class="form-control" required
                                            name="user_last_name"
                                            value="<?php echo $userInformationData['user_last_name'] ?>" />
                                        <label class="form-label" for="form12">Soyad</label>
                                        <div class="invalid-feedback">Soyad boş bırakılamaz.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group flex-nowrap form-outline mb-3">
                                        <span class="input-group-text" id="addon-wrapping">+90</span>
                                        <input type="text" id="phone-number" class="form-control"
                                            name="user_phone_number" required
                                            value="<?php echo substr($userInformationData['user_phone_number'], 4) ?>"
                                            onkeydown="phoneNumberFormatter()" />
                                        <label class="form-label" for="phone-number">Telefon</label>
                                        <div class="invalid-feedback">Telefon boş bırakılamaz.</div>
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
                                            <h4><i class="fa-solid fa-plus"></i> Adres Ekle</h4>
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
                                        <input type="text" id="form12" class="form-control" required
                                            name="invoice_user_first_name"
                                            value="<?php echo $userInformationData['user_first_name'] ?>" />
                                        <label class="form-label" for="form12">Ad</label>
                                        <div class="invalid-feedback">Ad boş bırakılamaz.</div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form12" class="form-control" required
                                            name="invoice_user_last_name"
                                            value="<?php echo $userInformationData['user_last_name'] ?>" />
                                        <label class="form-label" for="form12">Soyad</label>
                                        <div class="invalid-feedback">Soyad boş bırakılamaz.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group flex-nowrap form-outline mb-3">
                                        <span class="input-group-text" id="addon-wrapping">+90</span>
                                        <input type="text" id="phone-number-invoice" class="form-control"
                                            name="invoice_user_phone_number" required
                                            value="<?php echo substr($userInformationData['user_phone_number'], 4) ?>"
                                            onkeydown="phoneNumberFormatterForInvoice()" />
                                        <label class="form-label" for="phone-number">Telefon</label>
                                        <div class="invalid-feedback">Telefon boş bırakılamaz.</div>
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
                                                    <h4><i class="fa-solid fa-plus"></i> Adres Ekle</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add_order" class="btn btn-primary btn-block mb-3">Alışverişi
                            Tamamla</button>
                    </form>
                    <form action="business/cart-approved.request.php" method="POST">
                        <button type="submit" name="cancel_shop" class="btn btn-danger btn-block mb-3">Alışverişi İptal
                            Et</button>
                    </form>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, provident magni. Doloremque
                        nesciunt itaque nemo recusandae cumque? Molestiae accusamus, corrupti quo ex, distinctio
                        voluptates facilis atque cum in porro iure!</span>
                </div>
            </div>

        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <?php foreach ($cartApprovedData as $product): ?>
                <?php $totalPrice += ($product['discounted_price'] * $product['quantity']) ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    <img src="../assets/img/products/<?php echo $product['photo_name'] ?>"
                                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                </div>
                                <div class="ms-3">
                                    <h5>
                                        <?php echo $product['product_name'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 50px;">
                                    <h5 class="fw-normal mb-0">
                                        <?php echo $product['quantity'] ?>
                                    </h5>
                                </div>
                                <div style="width: 120px;">
                                    <h5 class="mb-0">
                                        <?php echo number_format(($product['discounted_price'] * $product['quantity']), 2, ',', '.') ?>
                                        TL
                                    </h5>
                                </div>
                            </div>
                            <form action="business/cart-approved.request.php" method="POST">
                                <input type="hidden" name="cart_id" value="<?php echo $product['cart_id'] ?>">
                                <button type="submit" class="btn btn-sm btn-primary" style="color: #cecece;"
                                    name="delete_from_cart">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <div class="text-end">
                <h2 class="h2-featured text-end">Toplam :
                    <?php echo number_format($totalPrice, 2, ',', '.') ?> TL</h1>
            </div>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus in esse deserunt, eveniet
                provident nobis ipsam fugit explicabo, cum corporis odit tempora et tempore consequuntur est voluptatem
                quos beatae illum?</span>
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