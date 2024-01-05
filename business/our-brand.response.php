<?php 
    include __DIR__.'/../classes/our-brand.class.php';

    $ourBrandModel=new OurBrand();

    $ourBrands=$ourBrandModel->getOurBrands();
?>