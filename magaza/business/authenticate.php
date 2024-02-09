<?php
session_start();
require_once __DIR__ . '/../classes/user.class.php';
require_once __DIR__ . '/../classes/site-settings.class.php';
require_once __DIR__ . '/../classes/activation-code.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/send-mail.php';
require_once __DIR__ . '/../helpers/mail-body.php';




if (isset($_POST['add_user'])) {
    $userModel = new User();
    $userData = [
        'user_email' => isset($_POST['user_email']) ? htmlspecialchars($_POST['user_email']) : '',
        'user_password' => isset($_POST['user_password']) ? htmlspecialchars($_POST['user_password']) : '',
        'confirm_password' => isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '',

    ];

    if (empty($userData['user_email']) || empty($userData['user_password']) || empty($userData['confirm_password'])) {
        ErrorHandler::showMessageAndRedirect("Lütfen Zorunlu Alanları Doldurun!", "../kayit-ol", 'error');
        exit();
    } else if ($userData['user_password'] != $userData['confirm_password']) {
        ErrorHandler::showMessageAndRedirect("Şifreler Eşleşmiyor!", "../kayit-ol", 'error');
        exit();
    } else if (!filter_var($userData['user_email'], FILTER_VALIDATE_EMAIL)) {
        ErrorHandler::showMessageAndRedirect("Lütfen Geçerli Bir Email Adresi Girin!", "../kayit-ol", 'error');
        exit();
    }


    $isExistEmail = $userModel->isExistEmail($userData);

    if ($isExistEmail) {

        ErrorHandler::showMessageAndRedirect("Bu e-posta adresi zaten mevcut!", "../kayit-ol", 'error');
        exit();
    }

    $result = $userModel->addUser($userData);

    if ($result) {
        function generateActivationCode($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $activationCode = '';
            for ($i = 0; $i < $length; $i++) {
                $activationCode .= $characters[rand(0, $charactersLength - 1)];
            }
            return $activationCode;
        }
        $activationCodeModel=new ActivationCode();
        $user=$userModel->getUserByEmail($userData['user_email']);
        $activationCode=generateActivationCode(50);
        $codeData=[
            'user_id'=>$user['user_id'],
            'code_type'=>'Register',
            'activation_code'=>$activationCode
        ];
        $isAddActivationCode=$activationCodeModel->addActivationCode($codeData);


        if ($isAddActivationCode) {
            $siteSettingModel = new SiteSettings();
            $siteSetting = $siteSettingModel->getAllSettingForEmail();
            $mailData = [
                'site_name' => $siteSetting['site_title'],
                'SMTP_Host' => $siteSetting['site_smtpHost'],
                'SMTP_Email' => $siteSetting['site_smtpEmail'],
                'SMTP_Username' => $siteSetting['site_smtpUser'],
                'SMTP_Password' => $siteSetting['site_smtpPassword'],
                'SMTP_Port' => intval($siteSetting['site_smtpPort']),
                'user_email' => $userData['user_email'],
                'mail_subject' => "Mail Onayı",
                'mail_body' => mailBody($siteSetting, $activationCode, $userData['user_email'])

            ];
            $isSent = sendVerificationEmail($mailData);
            if ($isSent) {
                ErrorHandler::showMessageAndRedirect("Kullanıcı Kaydı Başarılı! Doğrulama e-postası gönderildi.", "../kayit-ol", 'success');
                exit();
            } else {
                ErrorHandler::showMessageAndRedirect("Kullanıcı Kaydı Başarılı! Ancak doğrulama e-postası gönderilemedi.", "../kayit-ol", 'error');
                exit();
            }
        }
        else{
            ErrorHandler::showMessageAndRedirect("Kullanıcı Kaydı Başarılı! Ancak doğrulama e-postası gönderilemedi.", "../kayit-ol", 'error');
            exit();
        }

    } else {
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu!", "../kayit-ol", 'error');
        exit();
    }

}

if (isset($_POST['login_user'])) {
    $userModel = new User();
    $user_email = isset($_POST['user_email']) ? htmlspecialchars($_POST['user_email']) : '';
    $user_password = isset($_POST['user_password']) ? htmlspecialchars($_POST['user_password']) : '';

    $user = $userModel->getUserByEmail($user_email);

    if (!$user) {
        ErrorHandler::showMessageAndRedirect("Kullanıcı bulunamadı!", "./giris-yap", 'error');
        exit();
    } else if ($user['user_status'] != 1) {
        ErrorHandler::showMessageAndRedirect("Hesap Askıya Alınmıştır!", "../giris-yap", 'error');
        exit();
    } else if ($user['email_verified'] != 1) {
        ErrorHandler::showMessageAndRedirect("Lütfen Emailinizi Onaylayın!", "../giris-yap", 'error');
        exit();
    } else if (!password_verify($user_password, $user['user_password'])) {
        ErrorHandler::showMessageAndRedirect("Şifre Hatalı!", "../giris-yap", 'error');
        exit();

    } else {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['loggedIn'] = true;
        ErrorHandler::showMessageAndRedirect("Giriş Başarılı", "../", 'success');
        exit();
    }
}


?>