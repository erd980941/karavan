<?php
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/pagination.php';


$productModel = new Product();
$categoryId = null;

if (isset($_GET['category_id'])) {
    $categoryId = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

    if ($categoryId !== null && $categoryId !== false) {
        $products = $productModel->getProductsByCategoryAndSubcategories($categoryId);
    } else {
        $products = $productModel->getProducts();
    }
}else if(isset($_GET['search_query'])){
    $search_query= htmlspecialchars($_GET['search_query']);
    
    $products = $productModel->searchProducts($search_query);
}
 else {
    $products = $productModel->getProducts();
}

$productsFeatured = $productModel->getProductsByFeatured();


$productsPerPage = 12; // Her sayfada gösterilecek ürün sayısı
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Mevcut Sayfayı Bulma
$paginationResult = paginateItems($products, $productsPerPage, $current_page); 
$products = $paginationResult['paginatedItems'];
$totalPages = $paginationResult['totalPages'];


    

?>