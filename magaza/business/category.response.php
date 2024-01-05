<?php 
require_once __DIR__ . '/../classes/category.class.php';
$categoryModel = new Category();

$categories = $categoryModel->getCategories();


?>