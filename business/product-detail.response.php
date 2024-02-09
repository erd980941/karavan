<?php 
    include __DIR__.'/../classes/k-product.class.php';
    include __DIR__.'/../classes/k-product-photo.class.php';

    $productModel=new KProduct();
    $productPhotoModel=new KProductPhoto();

    $categoryUrl=htmlspecialchars($_GET['category_url']);
    $categoryType=htmlspecialchars($_GET['category_type']);
    $productUrl=htmlspecialchars($_GET['product_url']);

    $category=$categoryModel->getCategoryByUrl($categoryUrl);

    $product=$productModel->getProductByUrl($productUrl);
    $productPhotos=$productPhotoModel->getPhotosByProductId($product['k_product_id'])

    
?>