<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
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
                            <h2 class="h2-featured mb-5 text-center ">Kayıt Ol</h2>
                            <form action="business/authenticate.php" method="POST" class="needs-validation"
                                novalidate>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" name="user_email" email required />
                                    <label class="form-label" for="registerEmail">Email</label>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="user_password" minlength="6"
                                        maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                    <label class="form-label" for="registerPassword">Şifre</label>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <!-- Repeat Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="confirm_password" required />
                                    <label class="form-label" for="registerRepeatPassword">Şifre Tekrar</label>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <!-- Checkbox -->
                                <div class="d-flex mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" required />
                                    <label>
                                        <a data-mdb-toggle="modal" data-mdb-target="#hizmetKosullariModal"
                                            style="text-decoration:underline">Hizmet Koşullarını</a> Okudum
                                        Onaylıyorum.
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="add_user" class="btn btn-primary btn-block mb-3">Kayıt
                                    Ol</button>

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


            // Event Listener for password confirmation check
            const passwordInput = form.querySelector('input[name="user_password"]');
            const confirmPasswordInput = form.querySelector('input[name="confirm_password"]');
            confirmPasswordInput.addEventListener('input', () => {
                const confirmPasswordErrorDiv = confirmPasswordInput.closest('.form-outline').querySelector('.invalid-feedback');
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (password !== confirmPassword) {
                    confirmPasswordInput.setCustomValidity('Şifreler eşleşmiyor.');
                    confirmPasswordErrorDiv.textContent = 'Şifreler eşleşmiyor.';
                } else {
                    confirmPasswordInput.setCustomValidity('');
                    confirmPasswordErrorDiv.textContent = '';
                }
            });


        });



        function handleValidationErrors(form) {
            const emailInput = form.querySelector('input[name="user_email"]');
            const passwordInput = form.querySelector('input[name="user_password"]');
            const confirmPasswordInput = form.querySelector('input[name="confirm_password"]');

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
                } else if (passwordInput.validity.tooShort) {
                    passwordErrorDiv.textContent = 'Şifre en az 6 karakter olmalıdır.';
                } else if (passwordInput.validity.patternMismatch) {
                    passwordErrorDiv.textContent = 'Şifre en az 1 büyük harf, 1 küçük harf ve 1 rakam içermelidir.';
                }
            } else {
                passwordInput.closest('.form-outline').querySelector('.invalid-feedback').textContent = '';
            }
        }





    })();
</script>
<?php include 'views/footer.php' ?>