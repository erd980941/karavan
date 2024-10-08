<?php include __DIR__ . '/../business/our-document.response.php' ?>
<div class="section-title">
    <span>Belgelerimiz</span>
    <h2>Belgelerimiz</h2>
    <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
</div>

<div class="row">
    <?php foreach ($ourDocuments as $document): ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <a data-bs-toggle="modal" data-bs-target="#belgelerimizModal"
                data-bs-pdf-path="assets/documents/<?php echo $document['document_path'] ?>"
                data-bs-pdf-title="<?php echo $document['document_title'] ?>">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-file-pdf"></i></div>
                    <h4>
                        <?php echo $document['document_title'] ?>
                    </h4>
                    <p>Belgeyi Görüntülemek İçin Tıklayın</p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    <!-- Modal -->
    <div class="modal fade p-0" id="belgelerimizModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:0;overflow:hidden">
                    <!-- <input type="text" class="form-control" id="recipient-name"> -->
                    <iframe src="" width="100%" height="100%"></iframe>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script>
    const belgelerimizModal = document.getElementById('belgelerimizModal');

    if (belgelerimizModal) {
        belgelerimizModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const recipientPdfPath = button.getAttribute('data-bs-pdf-path');
            const recipientPdfTitle = button.getAttribute('data-bs-pdf-title')
            const iframe = belgelerimizModal.querySelector('.modal-body iframe');
            const modalTitle = belgelerimizModal.querySelector('.modal-title');
            modalTitle.textContent=recipientPdfTitle;
            iframe.src=recipientPdfPath;
        });
    }
</script>