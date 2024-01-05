<?php
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../classes/user.class.php';


if ($loggedIn) {
    $userModel = new User();
    $userId = htmlspecialchars($_SESSION['user_id']);
    $userEmail = htmlspecialchars($_SESSION['user_email']);

    $userData = $userModel->getUserInformation($userId, $userEmail);

    if (count($userData) < 1) {
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "./giris-yap", 'error');
        exit();
    }
} else {
    ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "./giris-yap", 'error');
    exit();
}

?>