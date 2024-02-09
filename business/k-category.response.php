<?php 
    include __DIR__.'/../classes/k-category.class.php';

    $categoryModel=new KCategory();

    $categoriesTypeTinyHouse=$categoryModel->getCategoriesByType('tinyhouse');
    $categoriesTypeTinyTicari=$categoryModel->getCategoriesByType('tinyticari');
    $categoriesTypeKaravan=$categoryModel->getCategoriesByType('karavan');
    $categoriesTypeRomork=$categoryModel->getCategoriesByType('romork');
    $categoriesTypeMarin=$categoryModel->getCategoriesByType('marin');

?>