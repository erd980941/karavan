<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/user-information.response.php' ?>

<section class="container mt-4" id="home-products">
<ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="kullanici-bilgilerim"><i class="fas fa-user"></i></i> Profil</a></li>
    </ul>
    <div class="row mt-4">
        <div class="col-lg-3">
            <?php include 'views/profil-side-menu.php' ?>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="row">

                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h2-featured mb-3">Kullanıcı Bilgilerim</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque explicabo amet beatae
                                eius earum quod in culpa corporis reprehenderit? Iste magni eligendi consequatur ipsam
                                pariatur, itaque laboriosam praesentium ullam accusantium.</p>
                            <div class="form-outline mb-4">
                                <input type="email" disabled id="form-email" class="form-control"
                                    value="<?php echo $userData['user_email'] ?>" />
                                <label class="form-label" for="form-email">Email</label>
                            </div>
                            <form action="business/user-information.request.php" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form-first-name" class="form-control"
                                                name="user_first_name"
                                                value="<?php echo $userData['user_first_name'] ?>" />
                                            <label class="form-label" for="form-first-name">Ad</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form-last-name" class="form-control"
                                                name="user_last_name"
                                                value="<?php echo $userData['user_last_name'] ?>" />
                                            <label class="form-label" for="form-last-name">Soyad</label>
                                        </div>
                                    </div>
                                </div>



                                <!-- Text input -->
                                <div class="input-group flex-nowrap form-outline mb-4">
                                    <span class="input-group-text" id="addon-wrapping">+90</span>
                                    <input type="text" id="phone-number" class="form-control" name="user_phone_number"
                                        value="<?php echo substr($userData['user_phone_number'], 4) ?>"
                                        onkeydown="phoneNumberFormatter()" />
                                    <label class="form-label" for="phone-number">Telefon</label>
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
                                    class="btn btn-primary btn-block mb-4">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/footer.php' ?>