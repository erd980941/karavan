<?php include __DIR__.'/../business/gallery-item.response.php' ?>
<h1 class="k-h1" style="margin-bottom:5rem">Galeri</h1>
<h4 class="text-center mb-5">Hayallerini Yollarda Yaşa..</h4>
<div class="gallery">
    <div class="row row-cols-2 row-cols-md-3 gy-4">
        <?php foreach ($galleryItems as $item): ?>
            <div class="col">
                <div class="overflow-hidden">
                    <a href="assets/img/gallery/<?php echo $item['image_path'] ?>">
                        <img src="assets/img/gallery/<?php echo $item['image_path'] ?>" class="img-fluid" alt="karavan"/>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>