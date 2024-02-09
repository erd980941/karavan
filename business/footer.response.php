<?php 
    include __DIR__.'/../classes/footer.class.php';

    $footerModel=new Footer();

    $categoriesTypeTinyHouseFooter=$footerModel->getKCategoriesByType('tinyhouse');
    $categoriesTypeTinyTicariFooter=$footerModel->getKCategoriesByType('tinyticari');
    $categoriesTypeKaravanFooter=$footerModel->getKCategoriesByType('karavan');
    $categoriesTypeRomorkFooter=$footerModel->getKCategoriesByType('romork');
    $categoriesTypeMarinFooter=$footerModel->getKCategoriesByType('marin');

    $socialMediaFooter=$footerModel->getSocialMedia();


?>