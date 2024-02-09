<?php 
    include __DIR__.'/../classes/k-product.class.php';

    $productModel=new KProduct();
    $categoryModel=new KCategory();

    $categoryUrl=htmlspecialchars($_GET['category_url']);
    $categoryType=htmlspecialchars($_GET['category_type']);
    $products=$productModel->getProductsByCategoryUrl($categoryUrl);
    $category=$categoryModel->getCategoryByUrl($categoryUrl);
?>