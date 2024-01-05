<?php
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/pagination.php';


$productModel = new Product();

$productsFeatured = $productModel->getProductsByFeatured();
$lastAddedProducts = $productModel->getLastAddedProducts();



?>