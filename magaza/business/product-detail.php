<?php
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../classes/product-photo.class.php';
require_once __DIR__ . '/../classes/category.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';

$productModel = new Product();
$photoModel = new ProductPhoto();
$categoryModel = new Category();

if (!isset($_GET['product_id'])) {
    header("../404");
    exit();
} else {
    $product_id=htmlspecialchars($_GET['product_id']);
    $product=$productModel->getProductById($product_id);
    if(empty($product)){
        ErrorHandler::showMessageAndRedirect("Ürün bulunamadı.", "./urunler", 'error');
        exit();
    }
    $categories=$categoryModel->getParentCategories($product['category_id']);
    $productPhotos=$photoModel->getPhotosByProductId($product_id);
    $productsFeatured = $productModel->getProductsByFeatured();

}
?>