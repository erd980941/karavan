<?php
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../classes/user-contact.class.php';

if ($loggedIn) {
    $userContactModel = new UserContact();
    $userId = htmlspecialchars($_SESSION['user_id']);

    $addresses = $userContactModel->getUserContact($userId);


} else {
    ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "giris-yap", 'error');
    exit();
}

?>