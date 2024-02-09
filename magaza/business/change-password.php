<?php
session_start();
require_once __DIR__ . '/../classes/user.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
function hasUpperCase($str) {
    return preg_match('/[A-Z]/', $str);
}

function hasLowerCase($str) {
    return preg_match('/[a-z]/', $str);
}

function hasDigit($str) {
    return preg_match('/\d/', $str);
}

function hasSpecialChar($str) {
    return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $str);
}

if(isset($_POST['change_password'])){
    $userModel=new User();
    $userId=htmlspecialchars($_SESSION['user_id']); 
    $userEmail=htmlspecialchars($_SESSION['user_email']);
    $userData=$userModel->getUserInformation($userId,$userEmail);

    if(count($userData)<1) {
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../sifre-degistir", 'error');
        exit();
    }
    $userPasswordData=[
        'current_password'=>htmlspecialchars($_POST['current_password']),
        'new_password'=>htmlspecialchars($_POST['new_password']),
        'confirm_password'=>htmlspecialchars($_POST['confirm_password']),
    ];

    foreach ($userPasswordData as $key => $value) {
        if (empty($value)) {
            switch ($key) {
                case 'current_password':
                    $errorFieldName = 'Mevcut Şifre';
                    break;
                case 'new_password':
                    $errorFieldName = 'Yeni Şifre';
                    break;
                case 'confirm_password':
                    $errorFieldName = 'Yeni Şifre Onay';
                    break;
                default:
                    $errorFieldName = ucfirst($key);
            }

            ErrorHandler::showMessageAndRedirect("{$errorFieldName} Alanı Boş Olamaz.", "../sifre-degistir", 'error');
            exit();
        }
    }
    
    $userPassword=$userModel->getUserPassword($userId,$userEmail);

    if (!password_verify($userPasswordData['current_password'], $userPassword)) {
        ErrorHandler::showMessageAndRedirect("Mevcut Şifre Hatalı.", "../sifre-degistir", 'error');
        exit();
    }

    if (!hasUpperCase($userPasswordData['new_password'])) {
        ErrorHandler::showMessageAndRedirect("Yeni Şifre Büyük Harf İçermelidir.", "../sifre-degistir", 'error');
        exit();
    }

    if (!hasLowerCase($userPasswordData['new_password'])) {
        ErrorHandler::showMessageAndRedirect("Yeni Şifre Küçük Harf İçermelidir.", "../sifre-degistir", 'error');
        exit();
    }

    if (!hasDigit($userPasswordData['new_password'])) {
        ErrorHandler::showMessageAndRedirect("Yeni Şifre Rakam İçermelidir.", "../sifre-degistir", 'error');
        exit();
    }

    if (!hasSpecialChar($userPasswordData['new_password'])) {
        ErrorHandler::showMessageAndRedirect("Yeni Şifre Noktalama İşareti İçermelidir.", "../sifre-degistir", 'error');
        exit();
    }

    if($userPasswordData['new_password']!=$userPasswordData['confirm_password']){
        ErrorHandler::showMessageAndRedirect("Şifreler Eşleşmiyor.", "../sifre-degistir", 'error');
        exit();
    }

    $userPasswordData['user_id']=$userData['user_id'];
    $userPasswordData['user_email']=$userData['user_email'];


    $result=$userModel->changePassword($userPasswordData);

    if($result){
        ErrorHandler::showMessageAndRedirect("Şifreniz Değiştirildi.", "../sifre-degistir", 'success');
        exit();
    }else{
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../sifre-degistir", 'error');
        exit();
    }

    
    

    
}


?>