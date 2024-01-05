<?php 
session_start();
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../classes/user.class.php';

if(isset($_POST['update_user_information'])){
    $userModel=new User();
    $userId=htmlspecialchars($_SESSION['user_id']); 
    $userEmail=htmlspecialchars($_SESSION['user_email']);

    $userData=$userModel->getUserInformation($userId,$userEmail);

    if(count($userData)<1) {
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../", 'error');
        exit();
    }


    $userData=[
        'user_first_name'=>htmlspecialchars($_POST['user_first_name']),
        'user_last_name'=>htmlspecialchars($_POST['user_last_name']),
        'user_phone_number'=>htmlspecialchars("+90 ".$_POST['user_phone_number']),
        'user_id'=>$userId,
    ];


    $result=$userModel->updateUserInformation($userData);

    if($result){
        ErrorHandler::showMessageAndRedirect("Bilgileriniz Güncellendi.", "../kullanici-bilgilerim", 'success');
        exit();
    }
    else{
        ErrorHandler::showMessageAndRedirect("Bilgileriniz Güncellenirken Hata Oluştu.", "../kullanici-bilgilerim", 'success');
        exit();
    }
}
?>