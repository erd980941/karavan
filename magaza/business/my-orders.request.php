<?php
require_once __DIR__ . '/../classes/order.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';
session_start();


if(isset($_POST['update_order_status'])){
    $orderModel=new Order();

    $orderData=[
        'user_id'=>htmlspecialchars($_SESSION['user_id']),
        'order_id'=>htmlspecialchars($_POST['order_id']),
        'order_status'=>'Teslim Edildi'
    ];
    

    $result=$orderModel->updateOrderStatus($orderData);

    if($result){
        ErrorHandler::showMessageAndRedirect("Teslim Bilgisi Gönderildi.", "../siparislerim", 'success');
        exit();
    }
    else{
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../siparislerim", 'error');
        exit();
    }


}

?>