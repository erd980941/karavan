<?php
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/pagination.php';
require_once __DIR__ . '/../helpers/sorting.php';
require_once __DIR__ . '/../helpers/filter-price.php';

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



if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    $minPrice = floatval($_GET['min_price']);
    $maxPrice = floatval($_GET['max_price']);

    $products = filterByPriceRange($products, $minPrice, $maxPrice);
}

$sorting = isset($_GET['sorting']) ? $_GET['sorting'] : 'price_asc';
$products = sortProducts($products, $sorting);

$productsPerPage = 12; // Her sayfada gösterilecek ürün sayısı
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; //Mevcut Sayfayı Bulma
$paginationResult = paginateItems($products, $productsPerPage, $current_page); 
$products = $paginationResult['paginatedItems'];
$totalPages = $paginationResult['totalPages'];

?>