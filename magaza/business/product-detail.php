<?php
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../classes/product-photo.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';

$productModel = new Product();
$photoModel = new ProductPhoto();

if (!isset($_GET['product_id'])) {
    header("../404");
    exit();
} else {
    $product_id=$_GET['product_id'];
    $product=$productModel->getProductById($product_id);
    $productPhotos=$photoModel->getPhotosByProductId($product_id);
    $productsFeatured = $productModel->getProductsByFeatured();
}
?>