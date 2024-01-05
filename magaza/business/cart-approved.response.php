<?php
require_once __DIR__ . '/../classes/cart.class.php';
require_once __DIR__ . '/../classes/user.class.php';
require_once __DIR__ . '/../classes/user-contact.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';
require_once __DIR__ . '/../classes/product.class.php';


if ($loggedIn) {
    $cartModel = new Cart();
    $userId = htmlspecialchars($_SESSION['user_id']);
    $userEmail = htmlspecialchars($_SESSION['user_email']);

    $cartApprovedData = $cartModel->getCartByUserIdCartApproved($userId);
    $totalPrice = 0;

    if (empty($cartApprovedData)) {
        ErrorHandler::showMessageAndRedirect("Onaylanmış Ürününüz Bulunmamaktadır.", "./odeme-bekleyen", 'error');
        exit();
    }

    $userModel=new User();

    $userInformationData=$userModel->getUserInformation($userId,$userEmail);

    $userContactModel=new UserContact();

    $addressData=$userContactModel->getUserContact($userId);
    
    


} else {
    ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "./giris-yap", 'error');
    exit();
}

?>