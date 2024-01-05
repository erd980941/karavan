<?php
require_once __DIR__ . '/../classes/order.class.php';
require_once __DIR__ . '/../classes/order-detail.class.php';
require_once __DIR__ . '/../classes/order-shipping-info.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';


if ($loggedIn) {
   $orderModel = new Order();
   $orderDetailModel = new OrderDetail();
   $orderShippingInfoModel = new OrderShippingInfo();
   $userId = htmlspecialchars($_SESSION['user_id']);

   $orders = $orderModel->getUnpaidOrders($userId);

   //    $orderDetails=[];
   //    foreach($orders as $order){
   //     $orderDetails[$order['order_id']]=$orderDetailModel->getOrderDetailByOrderId($order['order_id']);
   //    }

   function getOrderDetails($orderId)
   {
      global $orderDetailModel;
      $orderDetails = $orderDetailModel->getOrderDetailByOrderId($orderId);
      return $orderDetails;
   }

   function getOrderShippingInfo($orderId)
   {
      global $orderShippingInfoModel;
      $orderShippingInfos = $orderShippingInfoModel->getAllShippingInfo($orderId);
      return $orderShippingInfos;
   }

} else {
   ErrorHandler::showMessageAndRedirect("Lütfen Giriş Yapın.", "./giris-yap", 'error');
   exit();
}

?>