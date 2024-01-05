<?php 
    include __DIR__.'/../classes/gallery-item.class.php';

    $galleryItemModel=new GalleryItem();

    $galleryItems=$galleryItemModel->getGalleryItems();

?>