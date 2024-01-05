<?php 
require_once 'classes/activation-code.class.php';
require_once 'classes/user.class.php';
require_once 'helpers/errorHandler.php';

if (isset($_GET['user_email']) && isset($_GET['activation_code'])) {
    $userModel = new User();
    $activationCodeModel = new ActivationCode();
    
    $user_email = htmlspecialchars($_GET['user_email']);
    $activation_code = htmlspecialchars($_GET['activation_code']);

    

    $user = $userModel->getUserByEmail($user_email);

    if (!$user) {
        ErrorHandler::showMessageAndRedirect("Kullanıcı bulunamadı.", "kayit-ol", 'error');
        exit();
    }

    $codeData = [
        'user_email' => $user_email,
        'activation_code' => $activation_code
    ];
    $activationCodeRecord = $activationCodeModel->getActivationCode($codeData);
    

    if ($activationCodeRecord) {

        $currentDate = date('Y-m-d H:i:s');
        $expires_at = $activationCodeRecord['expires_at'];

        if ($currentDate < $expires_at) {
            $updateResult = $userModel->updateUserEmailVerification($user['user_id']);

            if ($updateResult) {
                ErrorHandler::showMessageAndRedirect("Email başarıyla doğrulandı.", "giris-yap", 'success');
                exit();
            } else {
                ErrorHandler::showMessageAndRedirect("Email doğrulanırken bir hata oluştu.", "kayit-ol", 'error');
                exit();
            }
        } else {
            ErrorHandler::showMessageAndRedirect("Aktivasyon süresi doldu.", "kayit-ol", 'error');
            exit();
        }
    } else {
        ErrorHandler::showMessageAndRedirect("Geçersiz aktivasyon kodu.", "kayit-ol", 'error');
        exit();
    }
} else {
    ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "kayit-ol", 'error');
    exit();
}
?>
