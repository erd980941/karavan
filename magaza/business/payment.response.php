<?php
require_once __DIR__ . '/../classes/order.class.php';
require_once __DIR__ . '/../classes/order-detail.class.php';
require_once __DIR__ . '/../classes/order-shipping-info.class.php';
require_once __DIR__ . '/../classes/bank-account.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';


if ($loggedIn) {

    if (isset($_SESSION['order_id'])) {

        $orderModel = new Order();
        $orderDetailModel = new OrderDetail();
        $bankAccountModel = new BankAccount();
        $userId = htmlspecialchars($_SESSION['user_id']);
        $orderId = htmlspecialchars($_SESSION['order_id']);

        $order = $orderModel->getUnpaidOrdersByOrderId($userId, $orderId);

        unset($_SESSION['order_id']);

        if (empty($order)) {
            ErrorHandler::showMessageAndRedirect("Sipariş Bulunamadı.", "./odeme-bekleyen", 'error');
            exit();
        }

        $bankAccount = $bankAccountModel->getBankAccount();

        //    $orderDetails=[];
        //    foreach($orders as $order){
        //     $orderDetails[$order['order_id']]=$orderDetailModel->getOrderDetailByOrderId($order['order_id']);
        //    }

        $orderDetails = $orderDetailModel->getOrderDetailByOrderId($orderId);


    } else {
        ErrorHandler::showMessageAndRedirect("Sipariş Bulunamadı.", "./odeme-bekleyen", 'error');
        exit();
    }




} else {
    ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "./giris-yap", 'error');
    exit();
}

?>