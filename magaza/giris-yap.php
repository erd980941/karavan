<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/site-settings.response.php' ?>
<section class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 img-thumbnail ps-1 offset-lg-2">
                    <div class="row">
                        <div class="col-md-6 d-none d-md-block">
                            <img src="../assets/img/sign-in.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6 p-3">
                            <h2 class="h2-featured mb-5 text-center ">Giriş Yap</h2>
                            <form action="business/authenticate.php" method="POST" class="needs-validation" novalidate>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" name="user_email" required email />
                                    <label class="form-label" for="registerEmail">Email</label>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <!-- Repeat Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="user_password" required />
                                    <label class="form-label" for="registerRepeatPassword">Şifre</label>
                                    <div class="invalid-feedback"></div>
                                </div>


                                <!-- Submit button -->
                                <button type="submit" name="login_user" class="btn btn-primary btn-block mb-3">
                                    Giriş Yap
                                </button>
                                <div class="mb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#helpModal"
                                        class="text-primary"><b>Yardıma mı İhtiyacın Var?</b></a>
                                </div>

                                <div class="modal fade" id="helpModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Destek Hattı</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" >
                                                <div class="row justify-content-center align-items-center ">
                                                    <div class="col-auto">
                                                        <a class="fs-3 link-underline-primary btn btn btn-outline-primary"  href="tel:<?php echo $siteContactInformationData['site_tel'] ?>">
                                                            <i class="fa-solid fa-headset fs-1 me-4"></i>
                                                            <?php echo $siteContactInformationData['site_tel'] ?>
                                                        </a>
                                                    </div>
                                                    <div class="col-auto mt-4">
                                                        <a class="fs-3 link-underline-success btn btn btn-outline-success" target="_blank"  href="https://wa.me/<?php echo preg_replace('/[^\d\+]/','', $siteContactInformationData['site_tel']) ?>">
                                                            <i class="fa-brands fa-whatsapp fs-1 me-4"></i>
                                                            <?php echo $siteContactInformationData['site_tel'] ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
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
        </div>
    </div>
</section>
<!-- Açılır Modal -->
<div class="modal fade" id="hizmetKosullariModal" tabindex="-1" aria-labelledby="hizmetKosullariModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hizmetKosullariModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hizmet Koşulları Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel non, sed, voluptas et
                necessitatibus quas excepturi dolorum obcaecati esse dolorem optio possimus maiores velit facere at
                minima ea. At, odio!
            </div>

        </div>
    </div>
</div>


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