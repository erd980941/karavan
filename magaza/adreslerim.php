<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/address.response.php' ?>

<section class="container mt-4" id="home-products">
    <ul id="breadcrumb">
        <li><a href="/"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="./"><i class="fa-solid fa-shop"></i> Mağaza</a></li>
        <li><a href="kullanici-bilgilerim"><i class="fas fa-user"></i> Profil</a></li>
        <li><a href="adreslerim"><i class="fa-solid fa-map-location-dot"></i> Adreslerim</a></li>
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
                            <h2 class="h2-featured mb-3">Adreslerim</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque explicabo amet beatae
                                eius earum quod in culpa corporis reprehenderit? Iste magni eligendi consequatur ipsam
                                pariatur, itaque laboriosam praesentium ullam accusantium.
                            </p>
                            <div class="row">
                                <?php foreach ($addresses as $address): ?>
                                    <div class="col-lg-6">
                                        <div class="card bg-light adres-card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <b>
                                                        <?php echo $address['contact_title'] ?>
                                                    </b>
                                                    <div>
                                                        <!-- <button class="btn btn-sm btn-primary btn-floating"><i
                                                                class="fa-solid fa-pen-to-square"></i></button> -->
                                                        <form action="business/adress.request.php" method="POST">
                                                            <input type="hidden" name="contact_id"
                                                                value="<?php echo $address['contact_id'] ?>">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-<?php echo $address['contact_favorite'] ? 'warning' : '' ?> btn-floating"
                                                                name="update_favorite">
                                                                <i class="fa-solid fa-star"></i>
                                                            </button>
                                                            <button type="submit" name="delete_contact"
                                                                class="btn btn-sm btn-danger btn-floating">
                                                                <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                        </form>
                                                    </div>
                                                </div>
                                                <hr>
                                                <span>
                                                    <?php echo $address['contact_address'] ?><br>
                                                    <?php echo $address['contact_district'] ?>/
                                                    <?php echo $address['contact_city'] ?><br>
                                                    <?php echo $address['postal_code'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <div class="col-lg-12">
                                    <h2 class="h2-featured mb-3">Adres Ekle</h2>
                                    <form action="business/adress.request.php" method="POST" class="needs-validation"
                                        novalidate>
                                        <!-- Diğer form elemanları -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form-title" name="contact_title"
                                                        class="form-control" required />
                                                    <label class="form-label" for="form-title">Adres Başlığı</label>
                                                    <div class="invalid-feedback">Adres başlığı boş bırakılamaz.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form-city" class="form-control"
                                                        name="contact_city" required />
                                                    <label class="form-label" for="form-city">İl</label>
                                                    <div class="invalid-feedback">İl boş bırakılamaz.</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form-district" class="form-control"
                                                        name="contact_district" required />
                                                    <label class="form-label" for="form-district">İlçe</label>
                                                    <div class="invalid-feedback">İlçe boş bırakılamaz.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <textarea class="form-control" id="form-adress"
                                                        name="contact_address" required rows="4"></textarea>
                                                    <label class="form-label" for="form-adress">Adres</label>
                                                    <div class="invalid-feedback">Adres boş bırakılamaz.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form-title" name="postal_code"
                                                        class="form-control" required />
                                                    <label class="form-label" for="form-title">Posta Kodu</label>
                                                    <div class="invalid-feedback">Posta Kodu boş bırakılamaz.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" name="add_user_contact"
                                            class="btn btn-primary btn-block mb-4">Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Açılır Modal -->
<!-- <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Adresi Silmek İstediğinize Emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">İptal</button>
                <button onclick="" class="btn btn-danger" id="confirmDeleteBtn">Sil</button>
            </div>                       
        </div>
    </div>
</div>
<script>
    
    document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', () => {
        const contactId = button.getAttribute('data-contact-id');
        const deleteLink = `../business/user-contact.request.php?contact_id=${contactId}`;
        // İlgili silme işlemine yönlendirmek için deleteLink'i kullanabilirsiniz.
    });
});
</script> -->

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
<?php include 'views/footer.php' ?>