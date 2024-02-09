<?php
require_once __DIR__ . '/../classes/navbar.class.php';

$navbarModel = new Navbar();
if ($loggedIn) {
    $userId = htmlspecialchars($_SESSION['user_id']);

    $cartCount = $navbarModel->GetCartCount($userId);
    

   
} 
$categoriesTree = $navbarModel->getCategoriesTree();
$categoriesNav = $navbarModel->getCategories();

?>