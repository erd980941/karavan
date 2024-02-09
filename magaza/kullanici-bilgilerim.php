<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/user-information.response.php' ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="./">Anasayfa</a></li>
            <li><a href="./kullanici-bilglerim">Profil</a></li>
        </ol>
        <h2>Profil</h2>

    </div>
</section>
<section class="container" id="home-products">

    <div class="row ">
        <div class="col-lg-3"  data-aos="fade-right">
            <?php include 'views/profil-side-menu.php' ?>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0" data-aos="fade-left">
            <div class="row">

                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h2-featured mb-3">Kullanıcı Bilgilerim</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque explicabo amet beatae
                                eius earum quod in culpa corporis reprehenderit? Iste magni eligendi consequatur ipsam
                                pariatur, itaque laboriosam praesentium ullam accusantium.</p>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form-email">Email</label>
                                <input type="email" disabled id="form-email" class="form-control"
                                    value="<?php echo $userData['user_email'] ?>" />
                            </div>
                            <form action="business/user-information.request.php" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form-first-name">Ad</label>
                                            <input type="text" id="form-first-name" class="form-control"
                                                name="user_first_name"
                                                value="<?php echo $userData['user_first_name'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form-last-name">Soyad</label>
                                            <input type="text" id="form-last-name" class="form-control"
                                                name="user_last_name"
                                                value="<?php echo $userData['user_last_name'] ?>" />
                                        </div>
                                    </div>
                                </div>



                                <!-- Text input -->
                                <div class="mb-3">
                                    <label  class="form-label">Telefon</label>
                                    <div class="input-group flex-nowrap form-outline mb-4">
                                        <span class="input-group-text" id="addon-wrapping">+90</span>
                                        <input type="text" id="phone-number" class="form-control"
                                            name="user_phone_number"
                                            value="<?php echo substr($userData['user_phone_number'], 4) ?>"
                                            onkeydown="phoneNumberFormatter()" />
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
                                <!-- Submit button -->
                                <button type="submit" name="update_user_information"
                                    class="btn primary-button primary-border w-100 mb-4">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>