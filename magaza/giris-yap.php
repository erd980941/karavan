<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<section id="login" class="container">
    <div class="row">
        <div class="col-lg-8 img-thumbnail ps-1 offset-lg-2"  data-aos="zoom-in">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <img src="assets/img/sign-in.jpg" class="img-fluid ">
                </div>
                <div class="col-md-6 p-3">
                    <h2 class="h2-featured mb-5 text-center ">Giriş Yap</h2>
                    <form action="business/authenticate.php" method="POST" class="needs-validation" novalidate>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerEmail">Email</label>
                            <input type="email" class="form-control" name="user_email" required email />
                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Şifre</label>
                            <input type="password" class="form-control" name="user_password" required />
                            <div class="invalid-feedback"></div>
                        </div>


                        <!-- Submit button -->
                        <button type="submit" name="login_user" class="btn primary-button primary-border w-100 mb-3">
                            Giriş Yap
                        </button>
                        <div class="mb-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#helpModal"class="">
                                <b>Yardıma mı İhtiyacın Var?</b>
                            </a>
                        </div>

                        <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Destek Hattı</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center align-items-center ">
                                            <div class="col-auto">
                                                <a class="fs-3 btn help-button"
                                                    href="tel:<?php echo $siteContactInformationData['site_tel'] ?>">
                                                    <i class='bx bxs-phone' ></i>
                                                    <?php echo $siteContactInformationData['site_tel'] ?>
                                                </a>
                                            </div>
                                            <div class="col-auto mt-4">
                                                <a class="fs-3 btn help-button"
                                                    target="_blank"
                                                    href="https://wa.me/<?php echo preg_replace('/[^\d\+]/', '', $siteContactInformationData['site_tel']) ?>">
                                                    <i class='bx bxl-whatsapp' ></i>
                                                    <?php echo $siteContactInformationData['site_tel'] ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn help-button"
                                            data-bs-dismiss="modal">Kapat</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
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
                    handleValidationErrors(form);
                }
                form.classList.add('was-validated');
            }, false);
        });



        function handleValidationErrors(form) {
            const emailInput = form.querySelector('input[name="user_email"]');
            const passwordInput = form.querySelector('input[name="user_password"]');

            if (!emailInput.validity.valid) {
                const emailErrorDiv = emailInput.closest('.form-outline').querySelector('.invalid-feedback');
                if (emailInput.validity.valueMissing) {
                    emailErrorDiv.textContent = 'Email alanı boş bırakılamaz.';
                } else if (emailInput.validity.typeMismatch) {
                    emailErrorDiv.textContent = 'Geçerli bir email adresi girin.';
                }
            } else {
                emailInput.closest('.form-outline').querySelector('.invalid-feedback').textContent = '';
            }

            if (!passwordInput.validity.valid) {
                const passwordErrorDiv = passwordInput.closest('.form-outline').querySelector('.invalid-feedback');
                if (passwordInput.validity.valueMissing) {
                    passwordErrorDiv.textContent = 'Şifre alanı boş bırakılamaz.';
                }
            } else {
                passwordInput.closest('.form-outline').querySelector('.invalid-feedback').textContent = '';
            }
        }





    })();
</script>

<?php include 'views/footer.php' ?>