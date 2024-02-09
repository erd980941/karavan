<?php include 'views/header.php' ?>
<?php include 'views/navbar.php' ?>
<?php include 'business/product-detail.response.php' ?>
<?php
$category_type = ucfirst($category['category_type']);
$category_type = substr_replace($category_type, ' ' . strtoupper(substr($category_type, 4, 1)), 4, 1);
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?= base_url ?>">Anasayfa</a></li>
            <li>
                <?php
                switch ($category['category_type']) {
                    case "tinyhouse":
                        echo "<a href=". base_url ."/".$categoryType."/".$category['category_url'].">Tiny House</a>";
                        break;
                    case "tinyticari":
                        echo "<a href=". base_url ."/".$categoryType."/".$category['category_url'].">Tiny Ticari</a>";
                        break;
                    case "karavan":
                        echo "<a href=". base_url ."/".$categoryType."/".$category['category_url'].">Karavan</a>";
                        break;
                    case "romork":
                        echo "<a href=". base_url ."/".$categoryType."/".$category['category_url'].">Römork</a>";
                        break;
                    case "marin":
                        echo "<a href=". base_url ."/".$categoryType."/".$category['category_url'].">Marin</a>";
                        break;
                }
                ?>
            </li>
            <li><a href="<?= base_url ?>/<?php echo $categoryType ?>/<?php echo $category['category_url'] ?>">
                    <?php echo $category['category_name'] ?>
                </a></li>
            <li>
                <?php echo $product['product_name'] ?>
            </li>
        </ol>
        <h4>
            <?php echo $product['product_name'] ?>
        </h4>

    </div>
</section>
<!-- ======= Contact Section ======= -->
<section id="product-detail" class="product-detail">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <img src="<?= base_url ?>/assets/img/products/<?php echo $product['photo_name'] ?>" alt=""
                    class="img img-responsive img-fluid" data-aos="fade-down">
            </div>
            <div class="col-lg-8 mt-4 order-lg-1 order-2">
                <div class="product-detail-content" data-aos="fade-right">
                    <?php echo $product['product_description'] ?>
                </div>
            </div>
            <div class="col-lg-4 mt-4 order-lg-2 order-1" data-aos="fade-left">
                <div class="product-detail-properties">
                    <h4 class="text-center">Özellikler</h4>
                    <hr>
                    <?php echo $product['product_properties'] ?>
                    <div class="row mt-3">
                        <?php if (!empty($product['detail_pdf'])): ?>
                            <div class="col-6">
                                <a data-bs-toggle="modal" data-bs-target="#productDetail"
                                    data-bs-pdf-path="<?= base_url ?>/assets/documents/products/<?php echo $product['detail_pdf'] ?>"
                                    data-bs-pdf-title="<?php echo $product['product_name'] . " Detay" ?>"
                                    class="btn p-d-btn scrollto  w-100">
                                    <i class='bx bx-download'></i> Detaylar
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?php echo $product['product_link'] ?>" class="btn p-d-btn scrollto  w-100"><i
                                        class='bx bx-store'></i> Mağaza</a>
                            </div>
                        <?php else: ?>
                            <div class="col-12">
                                <a href="<?php echo $product['product_link'] ?>" class="btn p-d-btn scrollto  w-100"><i
                                        class='bx bx-store'></i> Mağaza</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section><!-- End Contact Section -->

<!-- Modal -->
<div class="modal fade p-0" id="productDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <span>Galeri</span>
            <h2>Galeri</h2>
            <!-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p> -->
        </div>
        <!-- 
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div> -->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">
            <?php foreach ($productPhotos as $photo): ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <a href="<?= base_url ?>/assets/img/products/<?php echo $photo['photo_name'] ?>"
                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link">
                        <img src="<?= base_url ?>/assets/img/products/<?php echo $photo['photo_name'] ?>" class="img-fluid"
                            alt="">
                    </a>

                </div>
            <?php endforeach; ?>

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                    <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                        class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div> -->

        </div>

    </div>
</section><!-- End Portfolio Section -->

</main><!-- End #main -->
<script>
    const belgelerimizModal = document.getElementById('productDetail');

    if (belgelerimizModal) {
        belgelerimizModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const recipientPdfPath = button.getAttribute('data-bs-pdf-path');
            const recipientPdfTitle = button.getAttribute('data-bs-pdf-title')
            const iframe = belgelerimizModal.querySelector('.modal-body iframe');
            const modalTitle = belgelerimizModal.querySelector('.modal-title');
            modalTitle.textContent = recipientPdfTitle;
            iframe.src = recipientPdfPath;
        });
    }
</script>
<?php include 'views/footer.php' ?>