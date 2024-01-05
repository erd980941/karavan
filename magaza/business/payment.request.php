<?php 
session_start();
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../classes/order.class.php';



if (isset($_POST['update_payment_status'])) {
    $orderModel=new Order();

    $userId=htmlspecialchars($_SESSION['user_id']);
    $orderId=htmlspecialchars($_POST['order_id']);
    
    $result=$orderModel->updateOrderPaymentStatus($userId,$orderId);

    if($result){
        ErrorHandler::showMessageAndRedirect("Ödeme İşlemi Onayınız Gönderildi.", "../siparislerim", 'success');
        exit();
    }
    else{
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../", 'error');
        exit();
    }

}


else{
    ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../", 'error');
    exit();
}
?>
