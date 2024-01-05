<?php
require_once __DIR__ . '/../classes/cart.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';
require_once __DIR__ . '/../classes/product.class.php';


if ($loggedIn) {
    $cartModel = new Cart();
    $userId = htmlspecialchars($_SESSION['user_id']);

    $cartData = $cartModel->getCartByUserId($userId);
    $totalPrice = 0;
} else {
    ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "./giris-yap", 'error');
    exit();
}

?>